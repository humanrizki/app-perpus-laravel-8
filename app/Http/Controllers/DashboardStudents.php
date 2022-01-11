<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use App\Models\ReturnReport;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardStudents extends Controller
{
    //
    public function index(){
        return view('admin.student.index',[
            'title'=>'Show list data student'
        ]);
    }
    public function show(User $user){
        return view('admin.student.show',[
            'title'=>'Show detail data student',
            'user'=>$user,
            
            
        ]);
    }
    public function loans(User $user){
        return view('admin.student.loans',[
            'title'=>'Show list data loan student',
            'user'=>$user,
            'loan'=>LoanReport::where('user_id',$user->id)->get()->pluck('id'),
        ]);
    }
    public function returns(User $user){
        return view('admin.student.returns',[
            'title'=>'Show list data return student',
            'user'=>$user,
            'return'=>ReturnReport::where('user_id',$user->id)->get()->pluck('id'),
        ]);
    }
}
