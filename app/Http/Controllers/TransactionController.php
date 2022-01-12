<?php

namespace App\Http\Controllers;

use App\Models\HomeroomMessage;
use App\Models\LoanReport;
use App\Models\ReplyHomeroomMessage;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('transaction.index',[
            'title'=>'Transaction page user',
        ]);
    }
    public function show(Transaction $transaction){
        return view('transaction.show',[
            'title'=>'Detail transaction page user',
            'transaction'=>$transaction
        ]);
    }
    public function coba(){
        $transactions = Transaction::query()
            ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
            ->where('loan_reports.return_date','<',Carbon::now())->where([
                'loan_reports.type'=>'tunai',
                'loan_reports.status'=>'borrow'
            ])->get();
        
        return view('transaction.coba',[
            'transaction'=>$transactions,
        ]);
    }
}
