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
    public function show(){
        return view('profile.show');
    }
    public function store(Request $request, User $user){
        $data_validated = $request->validate([
            'nisn'=>'required|numeric|max:10',
            'gender'=>'required',
            'phone'=>'required|string|max:14',
            'department'=>'required|string|max:50'
        ]);
        dd($user->name);
        return redirect()->route('/profile');
    }
}
