<?php

namespace App\Http\Controllers;

use App\Models\ClassUser;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    //
    public function register(){
        if(auth('admin')->user()->hasRole('admin')){
            return view('admin.register.index',[
                'title'=>'register homeroom',
                'positions'=>Position::all(),
                'genders'=>['Male','Female'],
                'classes_user'=>ClassUser::all(),
                'departments'=>Department::all()
            ]);
        }
        abort(403,'THIS ACTION IS UNAUTHORIZED');
    }
}
