<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{
    //
    public function redirectTo() {
        $role = Auth::user()->role; 
        switch($role){
            case 'admin':
                return '/admin_dashboard';
            break;
            case 'seller':
                return '/seller_dashboard';
            break; 
            default:
                return '/home'; 
            break;
        }
    }
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>'logout']);
    }
    public function index(){
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard');
        }
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
        return redirect('/admin/login');
    }
}
