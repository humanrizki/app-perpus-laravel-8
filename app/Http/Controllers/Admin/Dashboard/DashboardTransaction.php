<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\LoanReport;
use App\Models\ReturnReport;
use App\Models\Transaction;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

class DashboardTransaction extends Controller
{
    //
    public function index(){
        return view('admin.transaction.index',[
            'title'=>'Transaction Page'
        ]);
    }
    public function show(Transaction $transaction){
        

        return view('admin.transaction.show',[
            'title'=>'transaction show page?',
            'transaction'=>$transaction
        ]);
    }
    public function store(Request $request, Transaction $transaction){
        if(Carbon::now('Asia/Jakarta')->hour <= 24 && Carbon::now()->hour >= 7){
            $stock = $transaction->loan_report->book->stock + 1;
            $transaction->loan_report->book->update([
                'stock'=>$stock
            ]);
            ReturnReport::create([
                'return_dated'=>Carbon::parse(Carbon::now('Asia/Jakarta')),
                'date_of_payment'=>Carbon::parse($transaction->day_of_payment)->format('Y-m-d'),
                'loan_date'=>Carbon::parse($transaction->loan_report->loan_date)->format('Y-m-d'),
                'cost'=>$transaction->cost,
                'nominal'=>$transaction->nominal,
                'change'=>$transaction->nominal-$transaction->cost,
                'type_payment'=>$transaction->loan_report->type,
                'slug'=>Uuid::uuid(),
                'status'=>'done',
                'book_id'=>$transaction->loan_report->book_id,
                'user_id'=>$transaction->loan_report->user_id,
                'admin_id'=>$transaction->admin_id,
            ]);
            LoanReport::destroy($transaction->loan_report->id);
            Transaction::destroy($transaction->id);
            return redirect('/dashboard/transactions')->with('successToReturn','Sukses menyelesaikan transaksi, dan sudah dimasukkan dalam report return!');
        } else {
            return redirect('/dashboard/transactions/'.$transaction->slug)->with('errorToReturn','Tidak bisa mengatur pengembalian dikarenakan jam operasional habis!');
        }
    }
}
