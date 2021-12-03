<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanReport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function book(){
        return $this->belongsTo(Book::class,'id_book');
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin');
    }
    public function member(){
        return $this->belongsTo(Member::class,'id_member');
    }
}
