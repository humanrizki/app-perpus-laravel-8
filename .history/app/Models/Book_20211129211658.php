<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $guarded = ['id'];
    public function detail_book(){
        return $this->hasOne(DetailBook::class);
    }
    public function bookcase(){
        return $this->belongsTo(Bookcase::class);
    }
}
