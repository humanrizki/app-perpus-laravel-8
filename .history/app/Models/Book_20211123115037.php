<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id_book'];
    public function detail(){
        return $this->belongsTo(DetailBook::class);
    }
    public function bookcase(){
        return $this->belongsTo(Bookcase::class);
    }
}