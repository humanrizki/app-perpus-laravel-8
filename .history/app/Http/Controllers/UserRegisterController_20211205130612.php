<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'classes'=>ClassUser::all(),
            'departments'=>Department::all()
        ]);
    }
    public function register(Request $request){
        Validator::make($request->all(),[
            'username'=>'required|string|min:4|max:30',
            'name'=>'required|string|min:4|max:50',
            'email'=>'required|string|email:dns|unique:users',
            'password'=>'required|string|min:8|max:30',
            'class'=>'required',
            'department'=>'required'
        ])->validate();
        $validated = $request->validate([
            
        ]);
        
    }
}
