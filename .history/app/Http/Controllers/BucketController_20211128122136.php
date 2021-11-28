<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\DetailBook;

class BucketController extends Controller
{
    //
    public function index(){
        $detail_book = '';
        if(session()->has('detail_id')){
            $detail_book = Bucket::whereIn('user_id',session()->get('user_id'))->get();
        }else{
            $detail_book = Bucket::where('user_id',auth()->user()->id)->get();
        }
        return view('bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>$detail_book
        ]);
    }
}
