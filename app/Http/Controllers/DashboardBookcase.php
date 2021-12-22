<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardBookcase extends Controller
{
    //
    public function index(){
        return view('admin.bookcase.index',[
            'title'=>'bookcases page'
        ]);
    }
}
