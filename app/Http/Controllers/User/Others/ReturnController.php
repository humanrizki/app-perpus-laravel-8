<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.return.index',[
            'title'=>'Return report page'
        ]);
    }
}
