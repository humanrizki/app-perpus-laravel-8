<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'logout']);
    }
    public function index(){
        return view('admin.login',[
            'title'=>'page login admin'
        ]);
    }
}
