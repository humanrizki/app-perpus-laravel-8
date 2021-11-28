<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function store(Request $request){
        $data_validated = $request->validate([
            'nisn'=>'required|number|max:10',
            'gender'=>'required',
            'phone'=>'required|string|max:14',
            'department'=>'required|string|max:50'
        ]);
        $user = User::find(auth()->user()->id);
        $user->nisn = $data_validated['nisn'];
        $user->gender = $data_validated['gender'];
        $user->phone = $data_validated['phone'];
        $user->is_member = 1;
        $user->department = $data_validated['department'];
        $user->save();
        redirect()->to('/profile');
    }
}
