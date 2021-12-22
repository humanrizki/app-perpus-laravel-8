<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookcase;
use App\Models\CollectionBook;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
class BookTable extends LivewireDatatable
{
    public $model = Book::class;
    public $hideable = 'select';
    public $exportable = true;
    public function builder()
{
    return Book::query()
    ->leftJoin('categories','books.category_id','categories.id')
    ->leftJoin('collection_books','books.collection_book_id','collection_books.id')
    ->leftJoin('bookcases','books.bookcase_id','bookcases.id');
}
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id')
                ->searchable(),
                

            Column::name('title')
                ->label('Title')
                ->searchable(),

            Column::name('categories.name')
                ->label('Category')
                ->searchable(),

            Column::name('collection_books.name')
                ->label('Collection')
                ->searchable(),

            Column::name('bookcases.name')
                ->label('Bookcase')
                ->searchable(),

            Column::callback(['slug','id'], function ($slug, $id) {
                return "
                <div>
                <a href='/dashboard/books/".$slug."/edit' class='m-2 d-inline'><i class='bi bi-pen-fill text-warning'></i></a>
                <a href='/dashboard/books/".$slug."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>
                </div>
                ";
            })
            ->label('Action'),

            Column::delete()
            ->label('Delete'),


        ];
    }
    public function getCategoriesProperty(){
        return Category::all();
    }
    public function getCollectionBooksProperty(){
        return CollectionBook::all();
    }
    public function getBookcasesProperty(){
        return Bookcase::all();
    }
}