<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    //
    public function index(){
        return view('admin.login',[
            'title'=>'Login page admin'
        ]);
    }
}
