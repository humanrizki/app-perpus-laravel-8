<?php

namespace App\Http\Controllers;

use App\Models\HomeroomMessage;
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
        $stock = $loan->book->stock + 1;
        $loan->book->update([
            'stock'=>$stock
        ]);
        if($loan->status == 'pending'){
            HomeroomMessage::destroy(HomeroomMessage::where('loan_report_id','=',$loan->id)->first()->id);
            $loan->update([
                'status'=>'cancell',
                'forfeit'=>0
            ]);
            return redirect("/loan/$loan->slug")->with('cancellLoan','Berhasil membatalkan permintaan peminjaman dan menghapus data untuk dapat persetujuan dari walas!');
        } else {
            $loan->update([
                'status'=>'cancell',
                'forfeit'=>0
            ]);
            return redirect("/loan/$loan->slug")->with('cancellLoan','Berhasil membatalkan permintaan peminjaman!');
        }
    }
    public function delete(LoanReport $loan){
        $title = $loan->book->title;
        LoanReport::destroy($loan->id);
        return redirect("/loan")->with('deleteLoan','Berhasil menghapus permintaan peminjaman untuk buku '.$title.'!');
    }
}
