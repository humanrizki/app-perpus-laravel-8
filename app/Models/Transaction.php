<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function loan_report(){
        return $this->belongsTo(LoanReport::class);
    }
}
