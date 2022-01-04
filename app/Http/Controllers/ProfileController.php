<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('profile.index',[
            'title'=>'profie',
            'user'=>auth('web')->user()
        ]);
    }
    public function show(User $user){
        if($user->id == auth()->user()->id){
            return view('profile.show',[
                'title'=>'upgrade to member!',
                'user'=>$user
            ]);
        } else {
            return redirect()->route('profile');
        }
    }
    
    public function update(User $user,Request $request){
        if(is_null($user->nisn)){
            $data_validated = $request->validate([
                'nisn'=>'required|max:10|unique:users',
                'gender'=>'required',
                'phone'=>'required|regex:/(08)[0-9]{2}-[0-9]{4}-[0-9]{4,5}/',
            ]);
            $user->nisn = $data_validated['nisn'];
            $user->gender = $data_validated['gender'];
            $user->phone = $data_validated['phone'];
            $user->save();
        } else {
            $data_validated = $request->validate([
                'name'=>'required|min:5|max:50',
                'username'=>'required|min:5|max:30',
                'email'=>'required|email:dns',
                'password'=>'required|string|min:8',
                'nisn'=>'required|string|max:10|unique:users',
                'gender'=>'required',
                'phone'=>'required|string|max:14',
                'department'=>'required|string|max:50'
            ]);
            $user->name = $data_validated['name'];
            $user->username = $data_validated['username'];
            $user->email = $data_validated['email'];
            $user->password = Hash::make($data_validated['password']);
            $user->nisn = $data_validated['nisn'];
            $user->gender = $data_validated['gender'];
            $user->phone = $data_validated['phone'];
            $user->department = $data_validated['department'];
            $user->is_member = 1;
            $user->save();
        }
        return redirect()->route('profile');
    }
}