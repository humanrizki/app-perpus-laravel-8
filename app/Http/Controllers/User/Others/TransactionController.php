<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(){
        return view('user.transaction.index',[
            'title'=>'Transaction page user',
        ]);
    }
    public function show(Transaction $transaction){
        return view('user.transaction.show',[
            'title'=>'Detail transaction page user',
            'transaction'=>$transaction
        ]);
    }
    public function print(Transaction $transaction){
        return view('user.transaction.print',[
            'title'=>'Page print pdf',
            'transaction'=>$transaction,
        ]);
    }
}
