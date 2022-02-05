<?php

namespace App\Http\Livewire;

use App\Models\DetailClassDepartment;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public $model = User::class;
    public function builder()
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
            return User::query()->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
            ->leftJoin('departments','detail_class_departments.department_id','departments.id')
            ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id');
        } else {
            return User::query()
            ->where('users.detail_class_department_id',auth('admin')->user()->detail_class_department_id);
        }
    }

    public function columns()
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
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
                Column::name('class_users.class')
                ->label('Class')
                ->searchable(),
                Column::name('departments.department')
                ->label('Department')
                ->searchable(),
                Column::callback(['username'],function($username){
                    return "<a href='/dashboard/students/".$username."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>";
                })
                ->label('Action')
            ];
        }else{
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
}