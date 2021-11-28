<?php

namespace App\Http\Controllers;

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
            'phone'=>'required|number|max:14',
            'department'=>'required|string|max:50'
        ]);

    }
}
