<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTransaction extends Controller
{
    //
    public function index(){
        return view('admin.transaction.index',[
            'title'=>'Transaction Page'
        ]);
    }
}
