<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\Department;
use App\Models\DetailClassUser;
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
        $validator = Validator::make($request->all(),[
            'username'=>'required|string|min:4|max:30',
            'name'=>'required|string|min:4|max:50',
            'email'=>'required|string|email:dns|unique:users',
            'password'=>'required|string|min:8|max:30',
            'class'=>'required',
            'department'=>'required'
        ])->validate();
        $user = User::create([
            'name'=>$validator['name'],
            'username'=>$validator['username'],
            'email'=>$validator['email'],
            'password'=>$validator['password'],
            'rules_user_id'=>1,
        ]);
        $detail = DetailClassUser::create([
            'user_id'=>$user->id,
            'class_user_id'=>$validator['class'],
            'department_id'=>$validator['department'],
        ]);
        $user->update([
            'detail_class_user_id'=>
        ]);
    }
}
