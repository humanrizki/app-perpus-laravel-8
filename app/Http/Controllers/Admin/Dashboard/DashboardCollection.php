<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCollection extends Controller
{
    //
    public function index(){
        return view('admin.collection.index',[
            'title'=>'collections page'
        ]);
    }
}
