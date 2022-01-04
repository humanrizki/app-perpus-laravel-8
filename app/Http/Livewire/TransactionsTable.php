<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\Transaction;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TransactionsTable extends LivewireDatatable
{
    public $model = Transaction::class;
    public $hideable = 'select';
    public $exportable = true;
    public function builder()
    {
        return Transaction::query()
        ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
        ->where('transactions.admin_id',auth('admin')->user()->id);
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')
                    ->label('ID')
                    ->defaultSort('asc')
                    ->sortBy('id')
                    ->searchable(),
            Column::callback(['loan_reports.book_id'],function($book_id){
                return Book::find($book_id)->title;
            })->label('Book')->searchable(),
            Column::callback(['loan_reports.user_id'],function($user_id){
                return User::find($user_id)->name;
            })->label('User')->searchable(),
            DateColumn::name('day_of_payment')
            ->label('Payment Date'),
            Column::name('cost')
            ->label('Cost'),
            Column::name('nominal')
            ->label('Nominal'),
            Column::callback(['cost','nominal'],function($cost,$nominal){
                return $nominal-$cost;
            })->label('Change'),
            Column::name('loan_reports.type')
            ->label('Type'),
            Column::name('status')
            ->label('Status'),

        ];
    }
}