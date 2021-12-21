<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    //
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('login',[
            'title'=>'page of login'
        ]);
    }
    public function login(Request $request){
        
    }
}
