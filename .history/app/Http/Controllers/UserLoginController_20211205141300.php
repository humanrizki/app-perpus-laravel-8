<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(),[
            'email'=>'required|email:dns',
            'password'=>'required'
        ])->validate();
    }
}
