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
            LoanReport::where([
                'status'=>'request',
                'type'=>'tunai'
            ])->whereRaw('return_date < now()')->delete();
            // permintaan transaksi metode uang kas
            // $message = HomeroomMessage::query()
            // ->leftJoin('loan_reports','loan_reports.id','homeroom_messages.loan_report_id')
            // ->where('homeroom_messages.status','pending')->get();
            // if($message->count() == 0){
            //     LoanReport::where('status','=','request')->whereRaw('return_date < now()')->delete();
            // } else {
            //     LoanReport::where('status','=','pending')->whereRaw('return_date < now()')->delete();
            //     HomeroomMessage::whereIn('id',$message->pluck('id'))->get()->delete();
            //     ReplyHomeroomMessage::whereIn('homeroom_message_id',$message->pluck('homeroom_message_id'))->get()->delete();
            // }
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
                }
                Transaction::whereIn('loan_report_id',$loan_id)->delete();
                LoanReport::whereIn('id',$loan_id)->delete();
            }
            // $transactions = Transaction::query()
            // ->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')
            // ->where('loan_reports.return_date','<',Carbon::now())->where([
            //     'type'=>'kas',
            //     'status'=>'borrow'
            // ]);
            // if($transactions->count() != 0){
            //     foreach($transactions as $transaction){
            //         ReturnReport::create([
            //             'return_dated'=>Carbon::parse(Carbon::now('Asia/Jakarta')),
            //             'date_of_payment'=>Carbon::parse($transaction->day_of_payment)->format('Y-m-d'),
            //             'loan_date'=>Carbon::parse($transaction->loan_report->loan_date)->format('Y-m-d'),
            //             'cost'=>$transaction->cost,
            //             'nominal'=>$transaction->nominal,
            //             'change'=>$transaction->nominal-$transaction->cost,
            //             'type_payment'=>$transaction->loan_report->type,
            //             'slug'=>Uuid::uuid(),
            //             'status'=>'done',
            //             'book_id'=>$transaction->loan_report->book_id,
            //             'user_id'=>$transaction->loan_report->user_id,
            //             'admin_id'=>$transaction->admin_id,
            //         ]);
            //     }
            //     $message = HomeroomMessage::query()
            //     ->leftJoin('loan_reports','loan_reports.id','homeroom_messages.loan_report_id')
            //     ->where('homeroom_messages.status','agree')->get();
            //     HomeroomMessage::whereIn('id',$message->pluck('id'))->delete();
            //     ReplyHomeroomMessage::whereIn('homeroom_message_id',$message->pluck('homeroom_message_id'))->delete();
            //     LoanReport::whereIn('id',$transactions->pluck('loan_report_id'))->delete();
            //     Transaction::whereIn('id',$transactions->pluck('id'))->delete();
            // }
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
