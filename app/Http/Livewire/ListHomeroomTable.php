<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\DetailClassDepartment;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ListHomeroomTable extends LivewireDatatable
{
    public $model = Admin::class;
    public function builder()
    {
        return Admin::query()->role('homeroom');
    }
    public function columns()
    {
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
            Column::callback(['detail_class_department_id'],function($detail_class_department_id){
                $detailClassDepartmentInstance = DetailClassDepartment::find($detail_class_department_id);
                if(isset($detailClassDepartmentInstance)){
                    return $detailClassDepartmentInstance->class_user->class.' '.$detailClassDepartmentInstance->department->department;
                } else {
                    return 'Tidak punya class';
                }
            })
            ->label('Class')
            ->searchable(),
            Column::delete()
            ->label('Delete'),
        ];
    }
}