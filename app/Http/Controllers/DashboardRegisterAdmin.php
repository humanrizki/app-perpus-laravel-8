<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class DashboardRegisterAdmin extends Controller
{
    //
        public function createAdmin(){

        }
        public function storeAdmin(Request $request){
            $validatedData = Validator::make($request->all(),[
                'name'=>['required','max:100'],
                'username'=>['required','max:30','regex:/^\S*$/u','unique:admins,username'],
                'email'=>['required','max:50','unique:admins,email'],
                'position'=>['required'],
                'gender'=>['required'],
                'address'=>['required','max:150','string'],
                'password'=>['required','string', Password::min(8)->numbers()->mixedCase()->symbols() ]
            ])->validate();
            $admin = Admin::create([
                'name'=>$validatedData['name'],
                'username'=>$validatedData['username'],
                'email'=>$validatedData['email'],
                'position'=>$validatedData['position'],
                'gender'=>$validatedData['gender'],
                'address'=>$validatedData['address'],
                'password'=>Hash::make($validatedData['password'])
            ]);
            if($validatedData['type'] == 'admin'){
                $admin->assignRole('admin');
            } elseif($validatedData['type'] == 'headteacher'){
                $admins = Admin::with('roles')->get();
                $nonHeadTeacher = $admins->reject(function ($admin, $key) {
                    return $admin->hasAnyRole('headteacher');
                });
                if($nonHeadTeacher){
                    return redirect('/dashboard/reg/admin')->with('failedAddToAdmin','Untuk kepala sekolah sudah ada, anda tidak bisa menambahkannya lagi!');
                }else{
                    $admin->assignRole('headteacher');
                    return redirect('/dashboard/reg/admin')->with('successAddToAdmin','Data kepala sekolah berhasil ditambahkan!');
                }
            } else {
                $admin->update([
                    'detail_class_department_id'=>$request->detail_class_department
                ]);
                $admin->assignRole('homeroom');
            }
            return redirect('/dashboard/reg/admin')->with('successAddToAdmin','Berhasil menambahkan satu akun untuk anggota baru!');
        }
}
