<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bucket;
use App\Models\DetailBook;
use App\Models\LoanReport;
use Carbon\Carbon;
use Faker\Provider\Uuid;
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
    public function show(Book $list){
        $bucket = Bucket::where([
            'book_id'=>$list->id,
            'user_id'=>auth()->user()->id
        ])->first();
        $loan = LoanReport::where([
            'book_id'=>$list->id,
            'user_id'=>auth()->user()->id
        ])->first(); 
        return view('list.show',[
            'title'=>'list of book',
            'detail'=>$list,
            'bucket'=>$bucket,
            'loan'=>$loan
        ]);
    }
    public function store(Request $request, Book $list){
        if(Carbon::now('Asia/Jakarta')->hour <= 24 && Carbon::now('Asia/Jakarta')->hour >= 7){
            $bucket = Bucket::create([
                'book_id'=>$list->id,
                'user_id'=>auth()->user()->id
            ]);
            $bucket->update([
                'slug' => Uuid::uuid()
            ]);
            $bucket->save();
            return redirect("/lists/$list->slug")->with('addToBucket','Buku sudah berhasil dimasukkan kedalam keranjang!');
        } else {
            return redirect("/lists/$list->slug")->with('errorToBucket','Buku gagal dimasukkan kedalam keranjang karena jam operasional sudah habis!');
        }

    }
}
