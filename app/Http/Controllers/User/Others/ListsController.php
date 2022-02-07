<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Bucket;
use App\Models\LoanReport;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function index(){
        $books = Book::all();
        return view('user.list.index',[
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
        return view('user.list.show',[
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
            return redirect()->back()->with('addToBucket','Buku sudah berhasil dimasukkan kedalam keranjang!');
        } else {
            return redirect()->back()->with('errorToBucket','Buku gagal dimasukkan kedalam keranjang karena jam operasional sudah habis!');
        }
    }
}
