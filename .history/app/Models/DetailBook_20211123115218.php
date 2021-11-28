<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBook extends Model
{
    use HasFactory;
    protected $guarded = ['id_detail_book'];
    public function category(){
        return $this->belongsTo(Category::class,'id_category');
    }
}
