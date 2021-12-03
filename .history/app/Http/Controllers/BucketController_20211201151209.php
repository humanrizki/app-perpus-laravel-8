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
        if($bucket->is_loan == 0 && $bucket->user_id == auth()->user()->id) {
            return view('bucket.show',[
                'title'=>'checkout of book',
                'bucket'=>$bucket
            ]);
        } else {
            return redirect()->route('bucket');
        }
    }
    public function destroy(Bucket $bucket){
        Bucket::destroy($bucket->id);
        return redirect()->route('bucket');
    }
    public function store(Request $request, Bucket $bucket){
        $carbonDate = Carbon::parse(Carbon::now())->diffInDays($request['return_date']);
        $forfeit = ($carbonDate < 7) ? 0 : 200 * ($carbonDate - 7);
        $validatedData = $request->validate([
            'loan_date'=>'date_format:Y-m-d\TH:i',
            'return_date'=>'date_format:Y-m-d\TH:i'
        ]);
        $bucket->update([
            'is_loan'=>true
        ]);
        $bucket->save();
        LoanReport::create([
            'loan_date'=>Carbon::parse($validatedData['loan_date']),
            'return_date'=>Carbon::parse($validatedData['return_date']),
            'forfeit'=>$forfeit,
            'bucket_id'=>$bucket->id,
            'user_id'=>auth()->user()->id,
            'admin_id'=>$bucket->detail->admin_id
        ]);
        return redirect()->route("bucket");
    }
}
