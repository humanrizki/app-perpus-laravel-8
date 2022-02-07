<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardReturn extends Controller
{
    public function index(){
        return view('admin.return.index',[
            'title'=>'Admin Return page'
        ]);
    }
}
