<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;

class UserTeacherController extends Controller
{
    public function index(){
        return view('user.teacher.index',[
            'title'=>'Show detail teacher page',
            'teacher'=>Admin::where('detail_class_department_id','=',auth()->user()->detail_class_department_id)->first()
        ]);
    }
    public function show(User $user){
        return view('user.teacher.show',[
            'title'=>'show agreement by yours homeroom',
            'status'=>'agree'
        ]);
    }
}
