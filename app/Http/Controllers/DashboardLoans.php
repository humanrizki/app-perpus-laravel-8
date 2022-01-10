<?php

namespace App\Http\Controllers;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanReport $loanReport, Request $request)
    {
        //
        $validatedData = Validator::make($request->all(),[
            'cost'=>'required|numeric',
            'nominal'=>'required|numeric',
            'day_of_payment'=>'required|date_format:Y-m-d',
        ])->validate();
        if(Carbon::now('Asia/Jakarta')->hour <= 15 && Carbon::now('Asia/Jakarta')->hour >= 7){
            if(Carbon::parse($validatedData['day_of_payment'])->lessThan(Carbon::parse($loanReport->return_date)) && Carbon::parse($validatedData['day_of_payment'])->greaterThan(Carbon::parse($loanReport->loan_date))){
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
            } else{
                return redirect("/dashboard/loans/{$loanReport->slug}")->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena tanggal pembayaran lebih dari tanggal pengembalian atau tanggal pembayaran kurang dari tanggal peminjaman!');
            }
        } else {
            return redirect("/dashboard/loans/{$loanReport->slug}")->with('errorToTransaction','Data gagal untuk dimasukkan kedalam transaksi untuk buku '. $loanReport->book->title.', karena jam operasional telah habis!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanReport  $loanReport
     * @return \Illuminate\Http\Response
     */
    public function show(LoanReport $loanReport)
    {
        //
        if(auth('admin')->user()->hasRole('admin')){
            $message = (HomeroomMessage::where('loan_report_id',$loanReport->id)->first() == null) ? null : ReplyHomeroomMessage::where('homeroom_message_id',HomeroomMessage::where('loan_report_id',$loanReport->id)->first()->id)->first();
            return view('admin.loan.show',[
                'title'=>'show loan dashboard',
                'loan'=>$loanReport,
                'message'=>$message
            ]);
        }
        abort(403,'THIS ACTION IS UNAUTHORIZED');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanReport  $loanReport
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanReport $loanReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanReport  $loanReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanReport $loanReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanReport  $loanReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanReport $loanReport)
    {
        //
    }
}
