<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    //
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('guest'['except'=>'logout']);
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
        if(Auth::attempt([
            'email'=>$validator['email'],
            'password'=>$validator['password'],
            'rules_user_id'=>1
            ])){
            $request->session()->regenerate();
            return redirect()->intended('/profile');
        }
        return redirect('/login')->with('loginError','Login failed!');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
