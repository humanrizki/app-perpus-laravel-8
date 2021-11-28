<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
