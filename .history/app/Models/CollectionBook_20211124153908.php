<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectionBook extends Model
{
    use HasFactory;
    protected $guarded = ['id_collection'];
    public function detail(){
        return $this->hasMany(DetailBook::class,'')
    }
}
