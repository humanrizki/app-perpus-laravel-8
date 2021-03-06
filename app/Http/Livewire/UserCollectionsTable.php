<?php

namespace App\Http\Livewire;

use App\Models\CollectionBook;
use Livewire\Component;
use Livewire\WithPagination;
class UserCollectionsTable extends Component
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
        $collections = ($this->limitPerPage == 'all') ? CollectionBook::latest()->get() : CollectionBook::latest()->paginate($this->limitPerPage);
        if($this->search != null){
            if($this->limitPerPage == 'all'){
                $collections = CollectionBook::where('name','like','%'.$this->search.'%')->latest()->get();
            } else {
                $collections = CollectionBook::where('name','like','%'.$this->search.'%')->latest()->paginate($this->limitPerPage);
            }
        }
        
        return view('livewire.user-collections-table',[
            'collections'=>$collections
        ]);
    }
}
