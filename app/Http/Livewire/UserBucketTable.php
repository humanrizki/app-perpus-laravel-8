<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Bucket;
use Livewire\Component;
use Livewire\WithPagination;
class UserBucketTable extends Component
{
    use WithPagination;
    public $search;
    public $limitPerPage;
    protected $queryString = ['search'=>['except'=>'']];
    public $paginate = false;
    protected $paginationTheme = 'tailwind';
    public function render()
    {
        if($this->limitPerPage == 'all'){
            $this->paginate = false;
        } else {
            $this->paginate = true;
        }
        $buckets = ($this->limitPerPage == 'all') ? Bucket::latest()->get() : Bucket::latest()->paginate($this->limitPerPage);
        if($this->search != null){
            if($this->limitPerPage == 'all'){

                $buckets = Bucket::whereIn('book_id',Book::where('title','like','%'.$this->search.'%')->get()->pluck('id'))->latest()->get();
            } else {
                $buckets = Bucket::whereIn('book_id',Book::where('title','like','%'.$this->search.'%')->get()->pluck('id'))->latest()->paginate($this->limitPerPage);
            }
        }
        return view('livewire.user-bucket-table',[
            'buckets'=>$buckets
        ]);
    }
}
