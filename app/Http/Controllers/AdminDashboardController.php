<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\ClassUser;
use App\Models\Department;
use App\Models\LoanReport;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'genders'=>$genders,
            'classes_user'=>ClassUser::all(),
            'departments'=>Department::all()
        ]);
    }
    public function update(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>['required','max:100'],
            'username'=>['required','max:30','alpha_dash','unique:admins,username'],
            'email'=>['required','max:50','unique:admins,email'],
            'phone'=>['required','regex:/(08)[0-9]{2}-[0-9]{4}-[0-9]{4,5}/'],
            'position'=>['required'],
            'gender'=>['required'],
            'address'=>['required','max:150','string'],
            'password'=>['required','string', Password::min(8)->numbers()->mixedCase()->symbols() ]
        ])->validate();
        if(isset($validator['class']) && isset($validator['department'])){
            dd('mantap');
        } else {
            auth('admin')->user()->update([
                'name'=>$validator['name'],
                'username'=>$validator['username'],
                'email'=>$validator['email'],
                'phone'=>$validator['phone'],
                'position_id'=>$validator['position'],
                'gender'=>$validator['gender'],
                'address'=>$validator['address'],
                'password'=>Hash::make($validator['password'])
            ]);
            return redirect('/dashboard/admin/profile')->with('successUpdate','Data anda berhasil diperbaharui!');
        }
    }
}
