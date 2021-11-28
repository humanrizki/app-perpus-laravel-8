<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function detail_book(){
        return $this->belongsTo(DetailBook::class);
    }
    public function bookcase(){
        return $this->belongsTo(Bookcase::class);
    }
}
