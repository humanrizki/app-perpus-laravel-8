<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bucket;
use App\Models\DetailBook;
use Illuminate\Hashing\BcryptHasher;
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
        $lists = Book::with(['detail_books'])->latest()->get();
        return view('list.index',[
            'title'=>'list of book',
            'lists'=>$lists
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
    public function store(Request $request, DetailBook $list){
        Bucket::create([
            'detail_id'=>$list->id,
            'user_id'=>auth()->user()->id,
            'slug'=>hash('ripemd160',$list->slug)
        ]);
        return redirect("/lists/$list->slug");
    }
}
