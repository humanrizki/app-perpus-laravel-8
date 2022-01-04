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
    public function store(Request $request, Bucket $bucket){
        if(Carbon::parse($request->loan_date) > Carbon::parse($request->return_date)){
            return redirect("/bucket/$bucket->slug")->with('errorValidate','Input peminjaman tidak boleh lebih dari Input pengembalian!');
        } else {
            $validatedData = $request->validate([
                'loan_date'=>'date_format:Y-m-d',
                'return_date'=>'required|date_format:Y-m-d',
                'type'=>'required'
            ]);
            if($request->type == 'kas'){
                $details = [
                    'title'=>'Mail from Library CN',
                    'body'=>'Salah satu murid kamu memesan untuk meminjam buku dengan metode pembayaran melalui uang kas kelas, apakah kamu setuju?', 'id'];
                // dd(Admin::where('detail_class_department_id',auth()->user()->detail_class_department_id)->first()->email);
                Mail::to(Admin::where('detail_class_department_id',auth()->user()->detail_class_department_id)->first()->email)->send(new HomeroomMail($details));
            } else {
                $carbonDate = Carbon::parse(Carbon::now())->diffInDays($request->return_date);
                $forfeit = ($carbonDate < 7) ? 0 : 500 * ($carbonDate - 7);
                $stockDecrement = $bucket->book->stock - 1;
                $bucket->book->update([
                    'stock'=>$stockDecrement
                ]);
                $bucket->book->save();
                $loan = LoanReport::create([
                    'loan_date'=>Carbon::parse($validatedData['loan_date'])->setTimeZone('Asia/Jakarta'),
                    'return_date'=>Carbon::parse($validatedData['return_date'])->setTimezone('Asia/Jakarta'),
                    'forfeit'=>$forfeit,
                    'admin_id'=>$bucket->book->admin_id,
                    'slug'=>Uuid::uuid()
                ]);
                Bucket::destroy($bucket->id);
                return redirect()->route("bucket")->with('addToLoan','Data bucket berhasil ditambah ke peminjaman untuk buku '.$loan->book->title);
            }
        }
        
    }
}
