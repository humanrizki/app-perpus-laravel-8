<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword as MailForgotPassword;
use App\Models\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword;

class UserForgotPassword extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.forgot-password',[
            'title'=>'Forgot password user'
        ]);
    }
    public function verification(Request $request){
        $validatedData = Validator::make($request->all(),[
            'email'=>['required','email:dns']
        ])->validate();
        $user = User::where('email',$request->email)->first();
        // dd($user);
        $forgotPassword = ForgotPassword::where('email',$request->email)->first();
        if($forgotPassword){
            return redirect('/forgot-password')->with('alreadyAvailable','Kami sudah mengirimi anda email di box emailmu! Check dan rubah passwordmu!');
        } else {
            if($user){
                $token = Str::random(60);
                ForgotPassword::create([
                    'email'=>$validatedData['email'],
                    'token'=>$token
                ]);
                $details = [
                    'title'=>'Mail from Library CN',
                    'body'=>'Untuk reset password link ada dibawah ini!',
                    'link'=>url('/reset-password/'.$token)
                ];
                Mail::to($user->email)->send(new MailForgotPassword($details));
                return redirect('/forgot-password')->with('successSentEmail','Kami telah mengirimi kamu email untuk reset password, silahkan dicheck!');
            } else {
                return redirect('/forgot-password')->with('errorVerification','Invalid email!');
            }
        }
    }
    public function edit(ForgotPassword $forgot){
        return view('auth.reset-password',[
            'title'=>'reset password user'
        ]);
    }
    public function update(Request $request ,ForgotPassword $forgot){
        $validatedData = Validator::make($request->all(),[
            'password'=>['required',RulesPassword::min(8)->symbols()->numbers()->mixedCase(),'confirmed'],
            'password_confirmation'=>['required']
        ])->validate();
        User::where('email',$forgot->email)->first()->update([
            'password'=>Hash::make($validatedData['password'])
        ]);
        ForgotPassword::where('email',$forgot->email)->delete();
        return redirect('/login')->with('successResetPassword','Telah sukses mengubah kembali password!');
    }
}
