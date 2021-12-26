<?php

namespace App\Http\Controllers;

use App\Models\LoanReport;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('loan.index',[
            'title'=>'Loan page',
            'loans'=>LoanReport::where('user_id',
                    auth()->user()->id)->latest()->get()
        ]);
    }
    public function show(LoanReport $loan){
        return view('loan.show',[
            'title'=>'Loan page show',
            'loan'=>$loan
        ]);
    }
    public function cancel(LoanReport $loan){
        $loan->bucket->update([
            'is_loan'=>0
        ]);
        $loan->bucket->save();
        $stock = $loan->bucket->book->stock + 1;
        $loan->bucket->book->update([
            'stock'=>$stock
        ]);
        $loan->bucket->book->save();
        LoanReport::destroy($loan->id);
        return redirect()->route('bucket')->with('deleteLoan','Berhasil menghapus permintaan peminjaman!');
    }
}
