<?php

namespace App\Http\Livewire;

use App\Models\Bookcase as ModelsBookcase;
use Livewire\Component;
use Livewire\WithPagination;
class Bookcase extends Component
{
    use WithPagination;
    public $bookcase;
    public $location_bookcase;
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
        $bookcases = ($this->limitPerPage == 'all') ? ModelsBookcase::latest()->get() : ModelsBookcase::latest()->paginate($this->limitPerPage);  
        if($this->search != null){
            if($this->limitPerPage == 'all'){
                $bookcases = ModelsBookcase::where('name','like','%'.$this->search.'%')->latest()->get(); 
            } else {
                $bookcases = ModelsBookcase::where('name','like','%'.$this->search.'%')->latest()->paginate($this->limitPerPage);
            }
        }
        return view('livewire.bookcase', ['bookcases'=>$bookcases]);
    }
    public function resetField(){
        if($this->updateField){
            $this->updateField = false;
        }
        $this->title = 'Store a Bookcase!';
        $this->bookcase = null;
        $this->location = null;
    }
    public function store(){
        $this->validate($this->rules());
        ModelsBookcase::create([
            'name'=>$this->bookcase,
            'location_bookcase'=>$this->location_bookcase
        ]);
        return redirect('/dashboard/bookcases');
    }
    public function edit($id){
        $this->updateField = true;
        $this->title = 'Update a Bookcase!';
        $bookcaseObject = ModelsBookcase::find($id);
        $this->ids = $bookcaseObject->id;
        $this->bookcase = $bookcaseObject->name;
        $this->location_bookcase = $bookcaseObject->location_bookcase;
    }
    public function update(){
        $bookcaseObject = ModelsBookcase::find($this->ids);
        if($bookcaseObject->location_bookcase != $this->location_bookcase){
            $this->validate($this->rules());
            ModelsBookcase::where('id',$this->ids)->update([
                'name'=>$this->bookcase,
                'location_bookcase'=>$this->location_bookcase
            ]);
            return redirect('/dashboard/bookcases');
        } else {
            ModelsBookcase::where('id',$this->ids)->update([
                'name'=>$this->bookcase,
                'location_bookcase'=>$this->location_bookcase
            ]);
            return redirect('/dashboard/bookcases');
        }
    }
    public function delete($id){
        ModelsBookcase::destroy($id);
        return redirect('/dashboard/bookcases');
    }
    protected function rules(){
        return [
            'bookcase'=>'required|max:40',
            'location_bookcase'=>'required|unique:bookcases'
        ];
    }
}
