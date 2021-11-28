<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BucketController extends Controller
{
    //
    public function index(){
        return view('bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>
        ]);
    }
}
