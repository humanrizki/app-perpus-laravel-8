<?php

namespace App\Http\Controllers;

use App\Models\DetailBook;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    //
    public function index(){
        $detail_book = '';
        if(session()->has('detail_id')){
            $detail_book = DetailBook::whereIn('id',session()->get('detail_id'))->get();
        }else{
            $detail_book = DetailBook::where('id',auth()->user()->id)->get();
        }
        return view('bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>$detail_book
        ]);
    }
}
