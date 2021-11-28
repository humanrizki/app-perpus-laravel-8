<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionBook extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function detail_book(){
        return $this->hasMany(DetailBook::class);
    }
}
