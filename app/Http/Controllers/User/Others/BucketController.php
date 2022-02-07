<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\Bucket;
use App\Models\User;

class BucketController extends Controller
{
    public function index(){
        $detail_book = Bucket::where('user_id',auth()->user()->id)->latest()->get();
        return view('user.bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>$detail_book,
        ]);
    }
    public function show(Bucket $bucket){
        if($bucket->is_loan == 0 && 
            $bucket->user_id == auth()->user()->id){
            return view('user.bucket.show',[
                'title'=>'checkout of book',
                'bucket'=>$bucket,
                'user'=>User::find(auth()->user()->id)->first()
            ]);
        }else{
            return redirect()->route('bucket');
        }
    }
    public function destroy(Bucket $bucket){
        $title = $bucket->book->title;
        Bucket::destroy($bucket->id);
        return redirect()->route('bucket')->with('destroyRow','Data bucket berhasil dihapus untuk buku '.$title);
    }
}
