<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.dashboard',[
            'title'=>'dashboard admin',
            'users'=>User::all()->count()
        ]);
    }
}
