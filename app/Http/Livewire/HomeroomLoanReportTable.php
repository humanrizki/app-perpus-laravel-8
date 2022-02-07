<?php

namespace App\Http\Livewire;

use App\Models\LoanReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class HomeroomLoanReportTable extends LivewireDatatable
{
    public $model = LoanReport::class;
    public $userId;
    public function builder()
    {
        return LoanReport::query()
        ->leftJoin('books','books.id','loan_reports.book_id')
        ->leftJoin('users','users.id','loan_reports.user_id')
        ->leftJoin('admins','admins.id','loan_reports.admin_id')
        ->where('users.id',$this->userId);
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
            DateColumn::name('return_date')
            ->format('d F Y')
            ->label('Loan')
            ->searchable(),
            NumberColumn::name('forfeit')
            ->label('Forfeit')
            ->searchable(),
            Column::name('status')
            ->label('Status')
            ->searchable(),
            Column::name('type')
            ->label('Type')
            ->searchable(),
        ];
    }
}