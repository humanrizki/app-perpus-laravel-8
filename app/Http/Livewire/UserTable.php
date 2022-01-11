<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public $model = User::class;
    public function builder()
    {
        //
        return User::query()
        ->where('users.detail_class_department_id',auth('admin')->user()->detail_class_department_id);
    }

    public function columns()
    {
        //
        return [
            Column::name('name')
            ->label('Name')
            ->searchable(),
            Column::name('username')
            ->label('Username')
            ->searchable(),
            Column::name('email')
            ->label('Email')
            ->searchable(),
            Column::name('gender')
            ->label('Gender')
            ->searchable(),
            Column::callback(['username'],function($username){
                return "<a href='/dashboard/students/".$username."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>";
            })
            ->label('Action')
        ];
    }
}