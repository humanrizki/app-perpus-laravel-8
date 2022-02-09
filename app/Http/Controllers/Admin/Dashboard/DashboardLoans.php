<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HomeroomMessage;
use App\Models\LoanReport;
use App\Models\ReplyHomeroomMessage;
use App\Models\Transaction;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DashboardLoans extends Controller
{

    public function index()
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
            return view('admin.loan.index',[
                'title'=>'loans page',
            ]);
        }
        abort(403,'THIS ACTION IS UNAUTHORIZED');
    }
    public function store(LoanReport $loanReport, Request $request)
    {
        //
        $validatedData = Validator::make($request->all(),[
            'cost'=>'required|numeric',
            'nominal'=>'required|numeric',
            'day_of_payment'=>'required|date_format:Y-m-d',
        ])->validate();
        if(Carbon::now('Asia/Jakarta')->hour <= 24 && Carbon::now('Asia/Jakarta')->hour >= 7){
            if(Carbon::parse($validatedData['day_of_payment'])->lessThan(Carbon::parse($loanReport->return_date)) && Carbon::parse($validatedData['day_of_payment'])->greaterThanOrEqualTo(Carbon::parse($loanReport->loan_date))){
                if($request->cost <= $request->nominal){
                    $loanReport->update([
                        'status'=>'borrow'
                    ]);
                    Transaction::create([
                        'loan_report_id'=>$loanReport->id,
                        'admin_id'=>$loanReport->book->admin->id,
                        'cost'=>$validatedData['cost'],
                        'nominal'=>$validatedData['nominal'],
                        'day_of_payment'=>$validatedData['day_of_payment'],
                        'status'=>'paid',
                        'slug'=>Uuid::uuid()
                    ]);
                    return redirect("/dashboard/loans")->with('successAddToTransaction','Data berhasil untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.'!');
                } else {
                    return redirect()->back()->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '.$loanReport->book->title.', karena nilai nominal kurang dari cost!');
                }
            } else{
                return redirect()->back()->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena tanggal pembayaran lebih dari tanggal pengembalian atau tanggal pembayaran kurang dari tanggal peminjaman!');
            }
        } else {
            return redirect()->back()->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena jam operasional telah habis!');
        }
    }
    public function show(LoanReport $loanReport)
    {
        if(auth('admin')->user()->hasRole('admin')){
            $message = (HomeroomMessage::where('loan_report_id',$loanReport->id)->first() == null) ? null : ReplyHomeroomMessage::where('homeroom_message_id',HomeroomMessage::where('loan_report_id',$loanReport->id)->first()->id)->leftJoin('homeroom_messages','reply_homeroom_messages.homeroom_message_id','homeroom_messages.id')->first();
            return view('admin.loan.show',[
                'title'=>'show loan dashboard',
                'loan'=>$loanReport,
                'message'=>$message
            ]);
        }
        abort(403,'THIS ACTION IS UNAUTHORIZED');
    }
    public function cancell(LoanReport $loanReport){
        if(Carbon::now('Asia/Jakarta')->hour <= 24 && Carbon::now('Asia/Jakarta')->hour >= 0){
                $loanReport->update([
                    'status'=>'cancell',
                    'forfeit'=>0
                ]);
                return redirect()->back()->with('cancellLoan','Berhasil membatalkan permintaan peminjaman!');
        }else{
            return redirect()->back()->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena jam operasional telah habis!');
        }
    }
    public function edit(LoanReport $loanReport)
    {
    }
    public function update(Request $request, LoanReport $loanReport)
    {
    }
    public function destroy(LoanReport $loanReport)
    {
        if(Carbon::now('Asia/Jakarta')->hour <= 24 && Carbon::now('Asia/Jakarta')->hour >= 0){
            $homeroomMessage = HomeroomMessage::where('loan_report_id','=',$loanReport->id)->first();
            if($homeroomMessage){
                ReplyHomeroomMessage::destroy(ReplyHomeroomMessage::where('homeroom_message_id',$homeroomMessage->id)->first()->id);
                HomeroomMessage::destroy($homeroomMessage->id);
                LoanReport::destroy($loanReport->id);
                return redirect('/dashboard/loans')->with('deleteLoan','Berhasil menghapus data permintaan peminjaman!');
            } else {
                LoanReport::destroy($loanReport->id);
                return redirect('/dashboard/loans')->with('deleteLoan','Berhasil menghapus data permintaan peminjaman!');
            }
        }else{
            return redirect()->back()->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena jam operasional telah habis!');
        }
    }
}
