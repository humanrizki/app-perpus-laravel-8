<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class UserTeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('teacher.index',[
            'title'=>'Show detail teacher page',
            'teacher'=>Admin::where('detail_class_department_id','=',auth()->user()->detail_class_department_id)->first()
        ]);
    }
    public function show(User $user){
        return view('teacher.show',[
            'title'=>'show agreement by yours homeroom',
            'status'=>'agree'
        ]);
    }
}
