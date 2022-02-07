<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function index(){
        return view('user.return.index',[
            'title'=>'Return report page'
        ]);
    }
}
