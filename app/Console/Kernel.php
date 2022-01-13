<?php

namespace App\Console;

use App\Models\HomeroomMessage;
use Carbon\Carbon;
use App\Models\LoanReport;
use App\Models\ReplyHomeroomMessage;
use App\Models\ReturnReport;
use App\Models\Transaction;
use DateTimeZone;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // permintaan transaksi metode uang tunai
            $loans = LoanReport::where([
                'status'=>'request',
                'type'=>'tunai'
            ])->whereRaw('return_date < now()')->delete();
            
            // permintaan transaksi dengan status pending dan metode uang kas
            
            $messages = HomeroomMessage::query()
            ->leftJoin('loan_reports','loan_reports.id','homeroom_messages.loan_report_id')
            ->where([
                'homeroom_messages.status'=>'pending',
                'loan_reports.status'=>'pending',
                'loan_reports.type'=>'kas'
            ])
            ->whereRaw('loan_reports.return_date < now()')->get();
            if($messages->count() != 0){
                $loan_id = [];
                foreach($messages as $message){
                    $loan_id[] = $message->loan_report_id;
                }
                LoanReport::whereIn('id',$loan_id)->delete();
                HomeroomMessage::whereIn('loan_report_id',$loan_id)->delete();
            } 
            // permintaan transaksi dengan status request dan metode uang kas
            $messages = HomeroomMessage::query()
            ->leftJoin('loan_reports','loan_reports.id','homeroom_messages.loan_report_id')
            ->where([
                'homeroom_messages.status'=>'agree',
                'loan_reports.status'=>'request',
                'loan_reports.type'=>'kas'
            ])->whereRaw('loan_reports.return_date < now()')->get();
            if($messages->count() != 0){
                $loan_id = [];
                foreach($messages as $message){
                    $loan_id[] = $message->loan_report_id;
                }
                LoanReport::whereIn('id',$loan_id)->delete();
                $HomeroomMessage = HomeroomMessage::whereIn('loan_report_id',$loan_id)->get();
                ReplyHomeroomMessage::whereIn('homeroom_message_id',$HomeroomMessage->pluck('id'))->delete();
                HomeroomMessage::whereIn('loan_report_id',$loan_id)->delete();
            } 
            // transaksi dengan metode uang tunai
            $transactions = Transaction::query()
            ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
            ->where('loan_reports.return_date','<',Carbon::now())->where([
                'loan_reports.type'=>'tunai',
                'loan_reports.status'=>'borrow'
            ])->get();
            if($transactions->count() != 0){
                $loan_id = [];
                foreach($transactions as $transaction){
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
                    $loan_id[] = $transaction->loan_report->id;
                    $stock = $transaction->loan_report->book->stock + 1;
                    $transaction->loan_report->book->update([
                        'stock'=>$stock
                    ]);
                }
                Transaction::whereIn('loan_report_id',$loan_id)->delete();
                LoanReport::whereIn('id',$loan_id)->delete();
            }
            // transaksi untuk metode uang kas
            $transactions = Transaction::query()
            ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
            ->where('loan_reports.return_date','<',Carbon::now('Asia/Jakarta'))->where([
                'loan_reports.type'=>'kas',
                'loan_reports.status'=>'borrow'
            ])->get();
            if($transactions->count() != 0){
                $loan_id = [];
                foreach($transactions as $transaction){
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
                    $stock = $transaction->loan_report->book->stock + 1;
                    $transaction->loan_report->book->update([
                        'stock'=>$stock
                    ]);
                    $loan_id[] = $transaction->loan_report_id;
                }
                $HomeroomMessage = HomeroomMessage::whereIn('loan_report_id',$loan_id)->get();
                ReplyHomeroomMessage::whereIn('homeroom_message_id',$HomeroomMessage->pluck('id'))->delete();
                HomeroomMessage::whereIn('loan_report_id',$loan_id)->delete();
                LoanReport::whereIn('id',$loan_id)->delete();
                Transaction::whereIn('loan_report_id',$loan_id)->delete();
            }
        })->everyMinute()->timezone('Asia/Jakarta');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
