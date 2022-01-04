<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeroomMessage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function loan_report(){
        return $this->belongsTo(LoanReport::class);
    }
}
