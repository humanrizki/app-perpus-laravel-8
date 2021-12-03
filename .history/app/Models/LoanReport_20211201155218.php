<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanReport extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function bucket(){
        return $this->belongsTo(Bucket::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
