<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bucket;
use App\Models\DetailBook;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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
            'bucket'=>Bucket::where([
                ['detail_id','=',$list->id],
                ['user_id','=',auth()->user()->id]
            ])->first(),
            
        ]);
    }
    public function store( DetailBook $list){
        $bucket = Bucket::where([
            ['user_id','=',auth()->user()->id],
            ['detail_id','=',$list->id]
        ])->get();
        if($request->session()->has('detail_id')){
            Bucket::create([
                'detail_id'=>$list->id,
                'user_id'=>auth()->user()->id
            ]);
            $request->session()->push('detail_id',$list->id);
            $request->session()->push('user_id',auth()->user()->id);
            
        } else {
            Bucket::create([
                'detail_id'=>$list->id,
                'user_id'=>auth()->user()->id
            ]);
            $array = [];
            $array[] = $list->id;
            $request->session()->put('detail_id',$array);
            $request->session()->put('user_id',[auth()->user()->id]);
        }
        return redirect("/lists/$list->slug");
    }
}
