<?php

namespace App\Http\Livewire;
use App\Models\Book;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
class UserBookTable extends LivewireDatatable
{
    public $model = Book::class;
    public $ids;
    public function builder(){
        if($this->ids){
            return Book::query()
            ->leftJoin('categories','books.category_id','categories.id')
            ->leftJoin('collection_books','books.collection_book_id','collection_books.id')
            ->leftJoin('bookcases','books.bookcase_id','bookcases.id')
            ->leftJoin('admins','books.admin_id','admins.id')
            ->where('books.collection_book_id','=',$this->ids);
        } else {
            return Book::query()
            ->leftJoin('categories','books.category_id','categories.id')
            ->leftJoin('collection_books','books.collection_book_id','collection_books.id')
            ->leftJoin('bookcases','books.bookcase_id','bookcases.id')
            ->leftJoin('admins','books.admin_id','admins.id');
        }
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
            Column::name('admins.name')
                ->label('Admin')
                ->searchable(),
            Column::callback(['slug','id'], function ($slug, $id) {
                return "
                <div>
                <a href='/lists/".$slug."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>
                </div>
                ";
            })
            ->label('Detail'),
        ];
    }
}