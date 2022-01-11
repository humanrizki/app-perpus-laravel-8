<?php

namespace App\Http\Livewire;

use App\Models\ReturnReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class HomeroomReturnReportTable extends LivewireDatatable
{
    public $model = ReturnReport::class;
    public function builder()
    {
        //
        return ReturnReport::query()
        ->leftJoin('books','books.id','return_reports.book_id')
        ->leftJoin('users','users.id','return_reports.user_id')
        ->leftJoin('admins','admins.id','return_reports.admin_id')
        ->where('users.detail_class_department_id',auth('admin')->user()->detail_class_department_id);
    }

    public function columns()
    {
        return [
            Column::name('books.title')
            ->label('Title')
            ->defaultSort('asc')
            ->sortBy('title')
            ->searchable(), 
            DateColumn::name('loan_date')
            ->format('d F Y')
            ->label('Loan')
            ->searchable(),
            DateColumn::name('returned_date')
            ->format('d F Y')
            ->label('Return')
            ->searchable(),
            DateColumn::name('date_of_payment')
            ->format('d F Y')
            ->label('Date payment')
            ->searchable(),
            NumberColumn::name('cost')
            ->label('Cost')
            ->searchable(),
            NumberColumn::name('nominal')
            ->label('Nominal')
            ->searchable(),
            NumberColumn::name('change')
            ->label('Change')
            ->searchable(),
            Column::name('status')
            ->label('Status')
            ->searchable(),
            Column::name('type_payment')
            ->label('Type')
            ->searchable(),
        ];
    }
}