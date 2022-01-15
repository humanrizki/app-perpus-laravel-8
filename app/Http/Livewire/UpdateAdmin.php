<?php

namespace App\Http\Livewire;

use App\Models\Position;
use Livewire\Component;

class UpdateAdmin extends Component
{
    public $name;
    public $username;
    public $email;
    public $position;
    public $gender;
    public $genders;
    public $address;
    public $phone;
    public $detail_class_department;
    public function render()
    {
        $this->name=auth('admin')->user()->name;
        $this->username=auth('admin')->user()->username;
        $this->email=auth('admin')->user()->email;
        $this->position=auth('admin')->user()->position_id;
        $this->gender=auth('admin')->user()->gender;
        $this->address=auth('admin')->user()->address;
        $this->phone=auth('admin')->user()->address;
        $this->genders = ['Male','Female'];
        return view('livewire.update-admin',[
            'positions'=>Position::all()
        ]);
    }
}
