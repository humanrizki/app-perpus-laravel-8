<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
class AddCategory extends ModalComponent
{
    public $title = 'Hello world';
    public function render()
    {
        return view('livewire.add-category');
    }
}
