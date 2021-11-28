<?php

namespace App\Http\Controllers;

use App\Models\DetailBook;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    //
    public function index(){

    }
    public function show(DetailBook $list){
        return view('list.show',[
            'title'=>'list of book',
            'detail'=>$list
        ]);
    }
}
