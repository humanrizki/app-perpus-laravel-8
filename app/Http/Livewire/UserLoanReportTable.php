<?php

namespace App\Http\Livewire;

use App\Models\LoanReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserLoanReportTable extends LivewireDatatable
{
    public $model = LoanReport::class;
    public function builder()
    {
        //
        return LoanReport::query()
        ->leftJoin('books','books.id','loan_reports.book_id')
        ->where('loan_reports.user_id','=',auth()->user()->id);
    }

    public function columns()
    {
        //
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
            ->label('Return')
            ->searchable(),
            Column::name('status')
            ->label('Status')
            ->searchable(),
            Column::name('type')
            ->label('Type')
            ->searchable(),
            Column::callback('slug',function($slug){
                return "<a href='/loan/".$slug."' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>";
            })
            ->label('Action')
        ];
    }
}