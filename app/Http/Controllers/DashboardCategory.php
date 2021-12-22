<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCategory extends Controller
{
    //
    /**
     * Class constructor.
     */
    
    
    public function index(){
        return view('admin.category.index',[
            'title'=>'Categories page'
        ]);
    }
}
