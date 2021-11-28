<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bucket;
use App\Models\DetailBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListsController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('list.index',[
            'title'=>'list of book',
            'lists'=>Book::latest()->get()
        ]);
    }
    public function show(DetailBook $list){
        return view('list.show',[
            'title'=>'list of book',
            'detail'=>$list,
            'loan'=>''
        ]);
    }
    public function store(Request $request, DetailBook $list){
        if(Session::get('detail_id')){
            Session::push('detail_id',$list->id);
        } else {
            Session::set('detail_id',[$list->id]);
        }
        return redirect("/lists/$list->slug");
    }
}
