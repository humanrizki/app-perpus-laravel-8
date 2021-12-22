<?php

namespace App\Http\Livewire;

use App\Models\CollectionBook;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
class CollectionBookTable extends LivewireDatatable
{
    public $model = CollectionBook::class;
    public $exportable = true;
    public $hideable = 'select';
    public function columns()
    {
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