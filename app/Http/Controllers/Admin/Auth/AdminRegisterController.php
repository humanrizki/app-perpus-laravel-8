<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ClassUser;
use App\Models\Department;
use App\Models\DetailClassDepartment;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminRegisterController extends Controller
{
    //
    public function create(){
            return view('admin.register.index',[
                'title'=>'register homeroom',
                'positions'=>Position::all(),
                'genders'=>['Male','Female'],
                'classes_user'=>ClassUser::all(),
                'departments'=>Department::all()
            ]);

    }
    public function register(Request $request){
        $validatedData = Validator::make($request->all(), [
            'name'=>'required|max:100',
            'username'=>'required|max:40|alpha_dash|unique:admins',
            'email'=>'required|email:dns|unique:admins',
            'address'=>'required',
            'phone'=>'required|regex:/(08)[0-9]{2}-[0-9]{4}-[0-9]{4,5}/',
            'gender'=>'required',
            'position'=>'required',
            'class'=>'required',
            'department'=>'required',
            'password'=> ['required',Password::min(8)->symbols()->numbers()->mixedCase()]
        ])->validate();
        $departmentClassInstance = DetailClassDepartment::where([
            'class_user_id'=>$validatedData['class'],
            'department_id'=>$validatedData['department']
            ])->first();
        $adminExist = Admin::where('detail_class_department_id',$departmentClassInstance->id)->first();
        if($adminExist){
            return redirect('/admin/register/homeroom')->with('registerFailed', "Sudah ada data terkait kelas {$departmentClassInstance->class_user->class} dan jurusan {$departmentClassInstance->department->department}");
        } else {
            $admin = Admin::create([
                'name'=>$validatedData['name'],
                'username'=>$validatedData['username'],
                'email'=>$validatedData['email'],
                'address'=>$validatedData['address'],
                'phone'=>$validatedData['phone'],
                'gender'=>$validatedData['gender'],
                'position_id'=>$validatedData['position'],
                'detail_class_department_id'=>$departmentClassInstance->id,
                'password'=>Hash::make($validatedData['password'])
            ]);
            $admin->assignRole('homeroom');
            return redirect('/admin/login')->with('successRegister', 'Anda telah sukses registrasi menjadi walas, silahkan Login!');
        }
    }
}
