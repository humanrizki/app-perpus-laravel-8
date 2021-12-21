<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth:admin',['except'=>'logout']);
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
            return redirect()->intended('/dashboard');
        }
        return redirect('/admin/login')->with('loginError','Login failed!');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
