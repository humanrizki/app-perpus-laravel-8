<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    function abbreviate($string){
        $abbreviation = "";
        $string = ucwords($string);
        $words = explode(" ", "$string");
        foreach($words as $word){
            if($word[0] != '&'){
                $abbreviation .= $word[0];
            } 
        }
        return $abbreviation; 
    }
}
