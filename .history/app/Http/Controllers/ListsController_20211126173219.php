<?php

namespace App\Http\Controllers;

use App\Models\DetailBook;
use App\Models\Book;
use App\Models\Bucket;
use Illuminate\Http\Request;

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
            'bucket'=>Bucket::where('detail_id',$list->id)->get()
        ]);
    }
    public function store(Request $request, DetailBook $list){
        Bucket::create([
            'admin_id'=>$request['admin_id'],
            'user_id'=>$request['user_id'],
            'detail_id'=>$request['detail_id']
        ]);
        return redirect("/lists/$list->slug");
    }
}
