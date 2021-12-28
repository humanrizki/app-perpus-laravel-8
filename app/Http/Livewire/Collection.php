<?php

namespace App\Http\Livewire;

use App\Models\CollectionBook;
use Livewire\Component;
use \Cviebrock\EloquentSluggable\Services\SlugService;
class Collection extends Component
{
    public $collection;
    public $slug;
    public $updateField = false;
    public $ids;
    public $title;
    public $search;
    public $limitPerPage;
    protected $queryString = ['search'=>['except'=>'']];
    public function render()
    {
        
        $collections = ($this->limitPerPage == 'all') ? CollectionBook::latest()->get() : CollectionBook::latest()->paginate($this->limitPerPage);
        if($this->search != null){
            $collections = CollectionBook::where('name','like','%'.$this->search.'%')->latest()->paginate($this->limitPerPage);
        }
        
        return view('livewire.collection',['collections'=>$collections]);
    }
     public function resetField(){
        if($this->updateField){
            $this->updateField = false;
        } 
        $this->title = 'Store a Collection!';
        $this->collection = null;
        $this->slug = null;
    }
    public function store(){
        $this->validate($this->rules());
        if($this->slug == null){
            $this->slug = SlugService::createSlug(CollectionBook::class, 'slug', $this->collection);
        }
        CollectionBook::create([
            'name'=>$this->collection,
            'slug'=>$this->slug
        ]);
        return redirect('/dashboard/collections');
    }
    public function edit($id){
        $this->updateField = true;
        $this->title = 'Update a Collection!';
        $collectionObject = CollectionBook::find($id);
        $this->ids = $collectionObject->id;
        $this->collection = $collectionObject->name;
        $this->slug = $collectionObject->slug;
    }
    public function update(){
        $collectionObject = CollectionBook::find($this->ids);
        if($collectionObject->slug != $this->slug){
            $this->slug = SlugService::createSlug(CollectionBook::class, 'slug', $this->collection);
            $this->validate($this->rules());
            CollectionBook::where('id',$this->ids)->update([
                'name'=>$this->collection,
                'slug'=>$this->slug
            ]);
            return redirect('/dashboard/collections');
        } else {
            $this->slug = SlugService::createSlug(CollectionBook::class, 'slug', $this->collection);
            CollectionBook::where('id',$this->ids)->update([
                'name'=>$this->collection,
                'slug'=>$this->slug
            ]);
            return redirect('/dashboard/collections');
        }
    }
    public function delete($id){
        CollectionBook::destroy($id);
        return redirect('/dashboard/collections');
    }
    protected function rules(){
        return [
            'collection'=>'required|max:50',
            'slug'=>'required|unique:collection_books'
        ];
    }
}
