<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\DetailBook;
use Carbon\Carbon;

class BucketController extends Controller
{
    //
    public function index(){
        $detail_book = Bucket::where('user_id',auth()->user()->id)->latest()->get();
        return view('bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>$detail_book
        ]);
    }
    public function show(Bucket $bucket){
        return view('bucket.show',[
            'title'=>'checkout of book',
            'bucket'=>$bucket
        ]);
    }
    public function destroy(Bucket $bucket){
        Bucket::destroy($bucket->id);
        return redirect()->route('bucket');
    }
    public function store(Request $request, Bucket $bucket){
        dd(Carbon::parse($request['loan_date'])->diffInDays());
    }
}
