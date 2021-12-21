<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function login(){
        $validator = Validator::make(request()->all(),[
            'email'=>'required|email:dns',
            'password'=>'required'
        ])->validate();
        if(Auth::guard('admin')->attempt($validator)){
            request()->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return redirect('/admin/login');
    }
}
