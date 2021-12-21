<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassUser;
use App\Models\Department;
use App\Models\DetailClassDepartment;
use Illuminate\Http\Request;
use App\Models\DetailClassUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $detail = DetailClassDepartment::where(function($query) use ($validator){
            $query->where('class_user_id',$validator['class'])->where('department_id',$validator['department']);
        })->first();
        User::create([
            'name'=>$validator['name'],
            'username'=>$validator['username'],
            'email'=>$validator['email'],
            'password'=>Hash::make($validator['password']),
            'rules_user_id'=>1,
            'detail_class_department_id'=>$detail->id
        ]);
        if(Auth::attempt(['email' => $validator['email'], 'password' => $validator['password']])){
            request()->session()->regenerate();
            return redirect()->intended('/profile')->with('successRegister','Registrasi berhasil dan akun sudah diterima untuk login saat ini.');
        } else {
            return redirect(route('/register'));
        }
    }
}
