<?php

namespace App\Http\Livewire;

use App\Models\CollectionBook;
use Livewire\Component;

class UserCollectionsTable extends Component
{
    public $search;
    protected $queryString = ['search'=>['except'=>'']];
    public function render()
    {
        if(is_null($this->search))
            $collections = CollectionBook::all();
        else 
            $collections = CollectionBook::where('name','like','%'.$this->search.'%')->get();
        
        return view('livewire.user-collections-table',[
            'items'=>$collections
        ]);
    }
}
