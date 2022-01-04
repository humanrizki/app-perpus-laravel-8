<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use App\Models\LoanReport;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
class LoanReportTable extends LivewireDatatable
{
    public $model = LoanReport::class;
    public $hideable = 'select';
    public $exportable = true;
    public function builder(){
        return LoanReport::query()
        ->leftJoin('books','loan_reports.book_id','books.id')
        ->leftJoin('users','loan_reports.user_id','users.id')
        ->where('loan_reports.admin_id','=',auth('admin')->user()->id);
    }
    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('asc')
                ->sortBy('id')
                ->searchable(),

            Column::name('books.title')
            ->label('Book')
            ->searchable(),
            Column::name('users.name')
            ->label('User')
            ->searchable(),
            Column::name('status')
            ->label('Status')
            ->searchable(),
            Column::name('type')
            ->label('Type')
            ->searchable(),
            Column::name('forfeit')
            ->label('Forfeit')
            ->searchable(),
            DateColumn::name('loan_date')
            ->label('Loan')
            ->searchable(),
            DateColumn::name('return_date')
            ->label('Return')
            ->searchable(),
            Column::callback(['slug'],function($slug){
                return "
                    <div>
                        <a href='/dashboard/loans/$slug' class='text-decoration-none'><i class='bi bi-eye-fill text-primary'></i></a>
                    </div>
                ";
            })->label('Action'),
        ];
    }
}