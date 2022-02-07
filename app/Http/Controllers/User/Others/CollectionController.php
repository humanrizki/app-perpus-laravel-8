<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\CollectionBook;
use Illuminate\Http\Request;
class CollectionController extends Controller
{
    public function index(){
        return view('user.collection.index',[
            'title'=>'collection page',
            'items'=>CollectionBook::all()
        ]);
    }
    public function show(CollectionBook $collection){
        return view('user.collection.show',[
            'title'=>'collection page of name',
            'collection'=> $collection
        ]);
    }
}
