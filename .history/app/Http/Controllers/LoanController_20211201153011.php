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
                    auth()->user()->id)->get()
        ]);
    }
}
