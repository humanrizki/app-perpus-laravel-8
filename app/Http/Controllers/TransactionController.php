<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use App\Models\Transaction;
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
}
