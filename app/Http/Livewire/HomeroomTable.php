<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\HomeroomMessage;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class HomeroomTable extends LivewireDatatable
{
    public $model = HomeroomMessage::class;
    public function builder()
    {
        return HomeroomMessage::query()
        ->leftJoin('loan_reports','homeroom_messages.loan_report_id','loan_reports.id')
        ->where('homeroom_messages.admin_id','=',auth('admin')->user()->id);
    }
    public function columns()
    {
        //
        return [
            Column::name('id')
            ->label('ID')
            ->defaultSort('asc')
            ->sortBy('id')
            ->searchable(),

            Column::callback(['loan_reports.book_id'],function($book_id){
                return Book::find($book_id)->title;
            })
            ->label('Book')
            ->searchable(),

            Column::callback(['loan_reports.user_id'],function($user_id){
                return User::find($user_id)->name;
            })
            ->label('Student')
            ->searchable(),

            Column::name('loan_reports.forfeit')
            ->label('Cost')
            ->searchable(),

            Column::name('status')
            ->label('Status')
            ->searchable(),

            Column::callback(['slug'],function($slug){
                return "
                <a href='/dashboard/agreements/".$slug."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>
                ";
            })
            ->label('Detail'),
        ];
    }
}