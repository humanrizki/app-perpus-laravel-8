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
    ->leftJoin('categories as category','books.category_id','category.id')
    ->leftJoin('collection_books as collection','books.collection_book_id','collection.id')
    ->leftJoin('bookcases as bookcase','books.bookcase_id','bookcase.id');
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

            Column::name('category.name')
                ->label('Category')
                ->filterable($this->categories),

            Column::name('collection.name')
                ->label('Collection')
                ->filterable(),

            Column::name('bookcase.name')
                ->label('Bookcase')
                ->filterable($this->bookcases),

            Column::callback(['slug'], function ($slug) {
                return "
                <div>
                <a href='/dashboard/books/".$slug."/edit' class='m-2'><i class='bi bi-pen-fill text-warning'></i></a>
                <a href='/dashboard/books/".$slug."' class='m-2'><i class='bi bi-eye-fill text-primary'></i></a>
                </div>
                ";
            })
            ->defaultSort('asc'),


            Column::delete()
                ->alignRight(),
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