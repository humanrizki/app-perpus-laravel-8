<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\Category as Categories;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;
    public $category;
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
        $categories = ($this->limitPerPage == 'all') ? Categories::latest()->get() : Categories::latest()->paginate($this->limitPerPage);  
        if($this->search != null){
            if($this->limitPerPage == 'all'){
                $categories = Categories::where('name','like','%'.$this->search.'%')->latest()->get();
            } else {
                $categories = Categories::where('name','like','%'.$this->search.'%')->latest()->paginate($this->limitPerPage);
            }
        }
        return view('livewire.category', ['categories'=>$categories]);
    }
    public function resetField(){
        if($this->updateField){
            $this->updateField = false;
        }
        $this->title = 'Store a Category!';
        $this->category = null;
        $this->slug = null;
    }
    public function store(){
        $this->validate($this->rules());
        if($this->slug == null){
            $this->slug = SlugService::createSlug(Categories::class, 'slug', $this->category);
        }
        Categories::create([
            'name'=>$this->category,
            'slug'=>$this->slug
        ]);
        return redirect('/dashboard/categories');
    }
    public function edit($id){
        $this->updateField = true;
        $this->title = 'Update a Category!';
        $categoryObject = Categories::find($id);
        $this->ids = $categoryObject->id;
        $this->category = $categoryObject->name;
        $this->slug = $categoryObject->slug;
    }
    public function update(){
        $categoryObject = Categories::find($this->ids);
        if($categoryObject->slug != $this->slug){
            $this->slug = SlugService::createSlug(Categories::class, 'slug', $this->category);
            $this->validate($this->rules());
            Categories::where('id',$this->ids)->update([
                'name'=>$this->category,
                'slug'=>$this->slug
            ]);
            return redirect('/dashboard/categories');
        } else {
            Categories::where('id',$this->ids)->update([
                'name'=>$this->category,
                'slug'=>$this->slug
            ]);
            return redirect('/dashboard/categories');
        }
    }
    public function delete($id){
        Categories::destroy($id);
        return redirect('/dashboard/categories');
    }
    protected function rules(){
        return [
            'category'=>'required|max:40',
            'slug'=>'required|unique:categories'
        ];
    }
}
