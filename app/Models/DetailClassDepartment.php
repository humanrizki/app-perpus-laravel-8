<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailClassDepartment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function class_user(){
        return $this->belongsTo(ClassUser::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
