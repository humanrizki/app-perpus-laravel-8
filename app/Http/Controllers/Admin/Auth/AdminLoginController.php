<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'=>'required|email:dns',
            'password'=>'required'
        ])->validate();
        if(Auth::guard('admin')->attempt([
            'email'=>$validator['email'],
            'password'=>$validator['password']
        ])){
            if(Auth::guard('admin')->user()->hasAnyRole('admin','headteacher','homeroom')){
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                Auth::guard('admin')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }
        return redirect('/admin/login')->with('loginError','Login failed!');
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
