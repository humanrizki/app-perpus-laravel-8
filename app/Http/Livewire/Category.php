<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Models\Category as Categories;

class Category extends Component
{
    public $category;
    public $categories;
    public $slug;
    public $updateField = false;
    public $ids;
    public function render()
    {
        $this->categories = Categories::all();   
        return view('livewire.category');
    }
    public function resetField(){
        if($this->updateField){
            $this->updateField = false;
        }
        $this->category = null;
        $this->slug = null;
    }
    public function store(){
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
        $categoryObject = Categories::find($id);
        $this->ids = $categoryObject->id;
        $this->category = $categoryObject->name;
        $this->slug = $categoryObject->slug;
    }
    public function update(){
        $this->slug = SlugService::createSlug(Categories::class, 'slug', $this->category);
        Categories::where('id',$this->ids)->update([
            'name'=>$this->category,
            'slug'=>$this->slug
        ]);
        return redirect('/dashboard/categories');
    }
    public function delete($id){
        Categories::destroy($id);
        return redirect('/dashboard/categories');
    }
}
