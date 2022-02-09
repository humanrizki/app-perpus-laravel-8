<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword as MailForgotPassword;
use App\Models\Admin;
use App\Models\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword;

class AdminForgotPassword extends Controller
{
    public function index(){
        return view('admin.auth.forgot-password',[
            'title'=>'forgot password admin'
        ]);
    }
    public function verification(Request $request){
        $validatedData = Validator::make($request->all(),[
            'email'=>'required|email:dns'
        ])->validate();
        $admin = Admin::where('email',$request->email)->first();
        $forgotPassword = ForgotPassword::where([
            'email'=>$admin->email,
            'table'=>'admins'
        ])->first();
        if($forgotPassword){
            return redirect('/admin/forgot-password')->with('alreadyAvailable','Kami sudah mengirimi anda email di box emailmu! Check dan rubah passwordmu!');
        } else {
            if($admin){
                $token = Str::random(60);
                ForgotPassword::create([
                    'email'=>$validatedData['email'],
                    'token'=>$token,
                    'table'=>'admins'
                ]);
                $details = [
                    'title'=>'Mail from Library CN',
                    'body'=>'Untuk reset password link ada dibawah ini!',
                    'link'=>url('/admin/reset-password/'.$token)
                ];
                Mail::to($admin->email)->send(new MailForgotPassword($details));
                return redirect('/admin/forgot-password')->with('successSentEmail','Kami telah mengirimi kamu email untuk reset password, silahkan dicheck!');
            } else {
                return redirect('/admin/forgot-password')->with('errorVerification','Invalid email!');
            }
        }
    }
    public function edit(ForgotPassword $forgot){
        if($forgot->table == 'admins'){
            return view('admin.auth.reset-password',[
                'title'=>'forgot password admin'
            ]);
        }
        abort(403,'THIS ACTION NOT ALLOWED');

    }
    public function update(Request $request, ForgotPassword $forgot){
            $validatedData = Validator::make($request->all(),[
                'password'=>['required', RulesPassword::min(8)->symbols()->numbers()->mixedCase(),'confirmed'],
                'password_confirmation'=>['required']
            ])->validate();
            Admin::where('email',$forgot->email)->first()->update([
                'password'=>Hash::make($validatedData['password'])
            ]);
            ForgotPassword::where([
                'email'=>$forgot->email,
                'table'=>'admins'
            ])->delete();
            return redirect('/admin/login')->with('successResetPassword','Telah sukses mengubah kembali password!');
    }
}
