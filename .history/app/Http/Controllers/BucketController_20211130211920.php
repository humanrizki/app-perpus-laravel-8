<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bucket;
use App\Models\DetailBook;
use App\Models\LoanReport;
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
            'bucket'=>$bucket,
            'carbon'=>Carbon::now()
        ]);
    }
    public function destroy(Bucket $bucket){
        Bucket::destroy($bucket->id);
        return redirect()->route('bucket');
    }
    public function store(Request $request, Bucket $bucket){
        $carbonDate = Carbon::parse(Carbon::now())->diffInDays($request['return_date']);
        // dd($carbonDate);
        $forfeit = 0;
        if($carbonDate < 7){
            $forfeit = 0;
        } else {
            $forfeit = 200 * ($carbonDate - 7);
        }
        $validatedData = $request->validate([
            'loan_date'=>'',
            'return_date'=>'required'
        ]);
        LoanReport::create([
            'loan_date'=>$validatedData['loan_date'],
            'return_date'=>$validatedData['return_date'],
            'forfeit'=>$forfeit,
            'book_id'=>$bucket->detail->id,
            'user_id'=>auth()->user()->id,
            'admin_id'=>$bucket->detail->admin_id
        ]);
        return redirect()->route("bucket");
    }
}
