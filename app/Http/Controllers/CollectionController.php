<?php

namespace App\Http\Controllers;

use App\Models\CollectionBook;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    //
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('collection.index',[
            'title'=>'collection page',
            'items'=>CollectionBook::all()
        ]);
    }
    public function show(CollectionBook $collection){
        return view('collection.show',[
            'title'=>'collection page of name',
            'collection'=> $collection
        ]);
    }
}
