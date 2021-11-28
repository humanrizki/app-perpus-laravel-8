<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index(){
        return view('profile.index',[
            'title'=>'profie',
            'user'=>auth()->user()
        ]);
    }
    public function store(Request $request){
        
    }
}
