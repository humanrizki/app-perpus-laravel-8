<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyHomeroomMessage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function homeroom_message(){
        return $this->belongsTo(HomeroomMessage::class);
    }
}
