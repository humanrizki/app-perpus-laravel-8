<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bucket;
use App\Models\DetailBook;
use App\Models\LoanReport;
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
        $books = Book::all();
        return view('list.index',[
            'title'=>'list of book',
            'books'=>$books
        ]);
    }
    public function show(DetailBook $list){
        $bucket = Bucket::where([
            ['detail_id','=',$list->id],
            ['user_id','=',auth()->user()->id]
        ])->first();
        $loan = (is_null($bucket)) ? null : LoanReport::where([
            ['bucket_id','=',$bucket->id],
        ])->first(); 
        return view('list.show',[
            'title'=>'list of book',
            'detail'=>$list,
            'bucket'=>$bucket,
            'loan'=>$loan
        ]);
    }
    public function store(Request $request, DetailBook $list){
        $bucket = Bucket::create([
            'detail_id'=>$list->id,
            'user_id'=>auth()->user()->id
        ]);
        $bucket->slug = hash('md5',$bucket->id);
        return redirect("/lists/$list->slug");
    }
}
