<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index(){
        $transaction = Transaction::whereIn('loan_report_id',LoanReport::where('user_id',auth()->user()->id)->pluck('id'))->get();
        return view('transaction.index',[
            'title'=>'Transaction page user',
            'transactions'=>$transaction
        ]);
    }
}
