<?php

namespace App\Http\Livewire;

use App\Models\Bookcase;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
class BookcaseTable extends LivewireDatatable
{
    public $model = Bookcase::class;
    public $exportable = true;
    public $hideable = 'select';
    public function columns()
    {
        //
        return [
            NumberColumn::name('id')
            ->label('Id')
            ->defaultSort('asc')
            ->sortBy('id')
            ->searchable(),

            Column::name('name')
            ->label('Name')
            ->searchable(),


            Column::delete()
            ->label('Action'),
        ];
    }
}