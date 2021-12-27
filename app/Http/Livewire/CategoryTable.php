<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
class CategoryTable extends LivewireDatatable
{
    public $model = Category::class;
    public $exportable = true;
    public $hideable = 'select';
    public function builder(){
        return Category::query();
    }
    public function columns(){
        //
        return [

            NumberColumn::name('id')
            ->label('Id')
            ->defaultSort('asc')
            ->sortBy('id')
            ->searchable(),

            Column::name('name')
            ->label('Name')
            ->searchable(),

            Column::callback(['categories.id'],function($id){
                return view('livewire.category.columnEdit',[
                    'id'=>$id
                ]);
            })->label('Update'),

            Column::delete()
            ->label('Delete'),
        ];
        
    }
}