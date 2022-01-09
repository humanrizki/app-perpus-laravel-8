<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Transaction;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTransactionTable extends LivewireDatatable
{
    public $model = Transaction::class;
    public function builder()
    {
        //
        return Transaction::query()
        ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
        ->leftJoin('admins','transactions.admin_id','admins.id')
        ->where('loan_reports.user_id',auth()->user()->id);
    }

    public function columns()
    {
        //
        return [
            Column::callback(['loan_reports.book_id'],function($book_id){
                return Book::find($book_id)->title;
            })->label('Book')->searchable(),
            DateColumn::name('day_of_payment')
            ->format('d F Y')
            ->label('Payment Date'),
            Column::name('cost')
            ->label('Cost'),
            Column::name('nominal')
            ->label('Nominal'),
            Column::callback(['cost','nominal'],function($cost,$nominal){
                return $nominal-$cost;
            })->label('Change'),
            Column::name('admins.name')
            ->label('Admin')
            ->searchable(),
            Column::name('loan_reports.type')
            ->label('Type'),
            Column::name('status')
            ->label('Status'),
            Column::callback(['slug'],function($slug){
                return "<div class='flex'>
                    <a href='/transaction/{$slug}' class='p-2 hover:bg-blue-600 hover:text-white text-gray-600'><i class='bi bi-eye-fill text-primary'></i></a>
                </div>";
            })
            ->label('Action')
        ];
    }
}