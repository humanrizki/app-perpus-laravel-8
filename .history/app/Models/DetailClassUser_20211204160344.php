<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailClassUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function class_user(){
        return $this->belongsTo(ClassUser::class);
    }
    public function departments(){
        return $this->belongsTo(Department::class);
    }
}
