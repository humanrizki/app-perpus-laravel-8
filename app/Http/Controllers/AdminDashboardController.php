<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('adminguest:admin');
    }
    public function index(){
        return view('admin.dashboard',[
            'title'=>'dashboard admin',
            'users'=>User::all()->count(),
            'loan'=>LoanReport::all()->count()
        ]);
    }
}
