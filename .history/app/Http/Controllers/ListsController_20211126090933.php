<?php

namespace App\Http\Controllers;

use App\Models\DetailBook;
use App\Models\Book;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    //
    public function index(){
        return view('list.index',[
            'title'=>'list of book',
            'lists'=>Book::latest()
        ]);
    }
    public function show(DetailBook $list){
        return view('list.show',[
            'title'=>'list of book',
            'detail'=>$list
        ]);
    }
}
