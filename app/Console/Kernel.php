<?php

namespace App\Console;

use App\Models\LoanReport;
use App\Models\Transaction;
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
            LoanReport::where('status','=','request')->whereRaw('now() > return_date')->update([
                'status'=>'cancell'
            ]);
            LoanReport::where('status','=','pending')->whereRaw('now() > return_date')->update([
                'status'=>'cancell'
            ]);
            Transaction::query()->leftJoin('loan_reports','transactions.loan_report_id','loan_reports.id')->where('loan_reports.return_date','<',Carbon::now())->delete();
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
