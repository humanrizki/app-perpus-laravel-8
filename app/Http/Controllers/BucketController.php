<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\DetailBook;
use App\Models\LoanReport;
use App\Models\User;
use Carbon\Carbon;

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
    public function store(Request $request, Bucket $bucket){
        $carbonDate = Carbon::parse(Carbon::now())->diffInDays($request['return_date']);
        $forfeit = ($carbonDate < 7) ? 0 : 200 * ($carbonDate - 7);
        $validatedData = $request->validate([
            'loan_date'=>'date_format:Y-m-d\TH:i',
            'return_date'=>'date_format:Y-m-d\TH:i'
        ]);
        $bucket->update([
            'is_loan'=>1,
        ]);
        $stockDecrement = $bucket->book->stock - 1;
        $bucket->book->update([
            'stock'=>$stockDecrement
        ]);
        $bucket->book->save();
        $bucket->save();
        LoanReport::create([
            'loan_date'=>Carbon::parse($validatedData['loan_date'])->setTimeZone('Asia/Jakarta'),
            'return_date'=>Carbon::parse($validatedData['return_date'])->setTimezone('Asia/Jakarta'),
            'forfeit'=>$forfeit,
            'bucket_id'=>$bucket->id,
            'user_id'=>auth()->user()->id,
            'admin_id'=>$bucket->book->admin_id
        ]);
        return redirect()->route("bucket")->with('addToLoan','Data bucket berhasil ditambah ke peminjaman untuk buku '.$bucket->book->title);
    }
}
