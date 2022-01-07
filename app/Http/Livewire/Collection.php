<?php

namespace App\Http\Livewire;

use App\Models\CollectionBook;
use Livewire\Component;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithPagination;
class Collection extends Component
{
    use WithPagination;
    public $collection;
    public $slug;
    public $updateField = false;
    public $ids;
    public $title;
    public $search;
    public $limitPerPage;
    public $paginate = false;
    protected $queryString = ['search'=>['except'=>'']];
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
