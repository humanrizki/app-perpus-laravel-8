<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'user'=>auth()->user()
        ]);
    }
    public function show(User $user){
        return view('profile.show',[
            'title'=>'upgrade to member!',
            'user'=>$user
        ]);
    }
    
    public function update(User $user,Request $request){
        // dd($request);
        $data_validated = $request->validate([
            'nisn'=>'required|max:10|unique:users',
            'gender'=>'required',
            'phone'=>'required|string|max:14',
            'department'=>'required|string|max:50'
        ]);
        // dd($data_validated);
        $user->nisn = $data_validated['nisn'];
        $user->gender = $data_validated['gender'];
        $user->phone = $data_validated['phone'];
        $user->department = $data_validated['department'];
        $user->is_member = 1;
        $user->save();
        return redirect()->route('/profile');
    }
}
