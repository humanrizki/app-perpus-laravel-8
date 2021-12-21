<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('register',[
            'title'=>'page of register',
            'classes'=>ClassUser::all()
        ]);
    }
    public function register(Request $request){
        $validated = $request->validate([
            'username'=>'required|string|min:4|max:30',
            'name'=>'required|string|min:4|max:50',
            'email'=>'required|string|email:dns|unique:users',
            'password'=>'required|string|min:8|max:30',
        ]);
        User::create([
            'username'=>$validated['username'],
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>$validated['password']
        ]);
    }
}
