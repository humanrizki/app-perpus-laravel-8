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
        $forfeit = ($carbonDate < 7) ? 0 : 200 * ($carbonDate - 7);
        // $validatedData = $request->validate([
        //     'loan_date'=>'required|date_format:Y-m-dTH:i:s',
        //     'return_date'=>'required|date_format:Y-m-dTH:i:s'
        // ]);
        dd($request['loan_date']);
        LoanReport::create([
            'loan_date'=>Carbon::parse($request['loan_date']),
            'return_date'=>Carbon::parse($request['return_date']),
            'forfeit'=>$forfeit,
            'book_id'=>$bucket->detail->id,
            'user_id'=>auth()->user()->id,
            'admin_id'=>$bucket->detail->admin_id
        ]);
        return redirect()->route("bucket");
    }
}
