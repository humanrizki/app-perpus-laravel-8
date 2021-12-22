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
    // public function builder(){
    //     return Category::query()
    //     ->leftJoin('categories','books.category_id','categories.id')
    //     ->leftJoin('collection_books','books.collection_book_id','collection_books.id')
    //     ->leftJoin('bookcases','books.bookcase_id','bookcases.id');
    // }
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

            Column::delete()
            ->label('Action'),
        ];
        
    }
}