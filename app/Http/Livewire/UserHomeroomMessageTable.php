<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\HomeroomMessage;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserHomeroomMessageTable extends LivewireDatatable
{
    public $model = HomeroomMessage::class;
    public $status;
    public function builder()
    {
        //
        if($this->status){
            return HomeroomMessage::query()
            ->leftJoin('admins','homeroom_messages.admin_id','admins.id')
            ->leftJoin('loan_reports','homeroom_messages.loan_report_id','loan_reports.id')
            ->where([
                'loan_reports.user_id'=>auth()->user()->id,
                'admins.detail_class_department_id'=>auth()->user()->detail_class_department_id,
                'homeroom_messages.status'=>$this->status
            ]);
        } else {
            return HomeroomMessage::query()
            ->leftJoin('admins','homeroom_messages.admin_id','admins.id')
            ->leftJoin('loan_reports','homeroom_messages.loan_report_id','loan_reports.id')
            ->where([
                'loan_reports.user_id'=>auth()->user()->id,
                'admins.detail_class_department_id'=>auth()->user()->detail_class_department_id
            ]);
        }
        
    }

    public function columns()
    {
        //
        return [
            Column::callback(['loan_reports.book_id'], function($book_id){
                return Book::find($book_id)->title;
            })
            ->label('Book')
            ->searchable(),

            Column::name('loan_reports.forfeit')
            ->label('Cost')
            ->searchable(),

            Column::name('homeroom_messages.status')
            ->label('Status')
            ->searchable(),
            Column::callback(['slug'],function($slug){
                return "<a href='/agreements/$slug' class='m-2 d-inline'><i class='bi bi-eye-fill text-primary'></i></a>";
            })->label('Action')
        ];
    }
}