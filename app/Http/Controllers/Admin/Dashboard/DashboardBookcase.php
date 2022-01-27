<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;

class DashboardBookcase extends Controller
{
    //
    public function index(){
        return view('admin.bookcase.index',[
            'title'=>'bookcases page'
        ]);
    }
}
