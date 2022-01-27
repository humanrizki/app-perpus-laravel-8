<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardCategory extends Controller

{
    public function index(){
        return view('admin.category.index',[
            'title'=>'Categories page'
        ]);
    }
}
