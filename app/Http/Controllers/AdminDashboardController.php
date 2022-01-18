<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminDashboardController extends Controller
{
    
    public function index(){
        return view('admin.dashboard.dashboard',[
            'title'=>'dashboard admin',
            'users'=>User::all()->count(),
            'loan'=>LoanReport::all()->count()
        ]);
    }
    public function profile(){
        return view('admin.profile.index',[
            'title'=>'profile admin page',
            'loans'=>LoanReport::all()
        ]);
    }


    public function edit(){
        $genders = ['Male','Female'];
        return view('admin.profile.edit',[
            'title'=>'edit your detail account',
            'positions'=>Position::all(),
            'genders'=>$genders
        ]);
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>['required','max:100'],
            'username'=>['required','max:30','regex:/^\S*$/u','unique:admins,username'],
            'email'=>['required','max:50','unique:admins,email'],
            'position'=>['required'],
            'gender'=>['required'],
            'address'=>['required','max:150','string'],
            'password'=>['required','string', Password::min(8)->numbers()->mixedCase()->symbols() ]
        ])->validate();
    }
}
