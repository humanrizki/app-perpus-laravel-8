<?php

namespace App\Http\Livewire;

use App\Models\ReturnReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ReturnReportTable extends LivewireDatatable
{
    public $model = ReturnReport::class;
    public $hideable = 'select';
    public $exportable = true;
    public function builder()
    {
        return ReturnReport::query()
        ->leftJoin('books','return_reports.book_id','books.id')
        ->leftJoin('users','return_reports.user_id','users.id')
        ->where('return_reports.admin_id',auth('admin')->user()->id);
    }
    public function columns()
    {
        return [
            Column::name('books.title')
            ->label('Book')
            ->searchable(),
            Column::name('users.name')
            ->label('User')
            ->searchable(),
            DateColumn::name('date_of_payment')
            ->label('Day of payment')
            ->format('d F Y ')
            ->sortBy('date_of_payment')
            ->defaultSort('asc')
            ->searchable(),
            DateColumn::name('loan_date')
            ->label('Loan')
            ->format('d F Y ')
            ->searchable(),
            DateColumn::name('returned_date')
            ->label('Return')
            ->format('d F Y ')
            ->searchable(),
            Column::name('cost')
            ->label('Cost')
            ->searchable(),
            Column::name('nominal')
            ->label('Nominal')
            ->searchable(),
            Column::name('change')
            ->label('Change')
            ->searchable(),
            Column::name('type_payment')
            ->label('Type')
            ->searchable(),
            Column::name('status')
            ->label('Status')
            ->searchable()
        ];
    }
}