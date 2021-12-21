<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Book;
use App\Models\Bookcase;
use App\Models\Category;
use App\Models\CollectionBook;

class DashboardBooks extends Component
{
    public $search;
    // public $category;
    // public $collection;
    // public $bookcase;
    // public $book;
    // public function mount(){
    //     $this->search = request()->query('search',$this->search);
    // }
    // protected $rules = [
    //     'category'=>'required'
    // ];
    public function render(){
        
        $this->book = Book::where('admin_id',auth('admin')->user()->id)
        ->get();
        
        
        return view('livewire.dashboard-books',[
            'books'=>$this->book,
            'categories'=>Category::all(),
            'collections'=>CollectionBook::all(),
            'bookcases'=>Bookcase::all(),
        ]);
    }
    
}
