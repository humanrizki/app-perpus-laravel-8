<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class TransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function coba(Transaction $transaction){
        
        return view('user.transaction.coba',[
            'title'=>'Page print pdf',
            'transaction'=>$transaction,
        ]);
    }
    public function pdf(Transaction $transaction){
        $pdf = PDF::loadView('user.transaction.coba',[
            'title'=>'Detail transaction page user',
            'transaction'=>$transaction
        ]);
        return $pdf->download('transaction.pdf');
    }
}
