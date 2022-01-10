<?php

namespace App\Http\Controllers;

use App\Mail\HomeroomMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\DetailBook;
use App\Models\LoanReport;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Mail;

class BucketController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $detail_book = Bucket::where('user_id',auth()->user()->id)->latest()->get();
        
        return view('bucket.index',[
            'title'=>'Bucket page',
            'detail_book'=>$detail_book,
        ]);
    }
    public function show(Bucket $bucket){
        if($bucket->is_loan == 0 && 
            $bucket->user_id == auth()->user()->id){
            return view('bucket.show',[
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
