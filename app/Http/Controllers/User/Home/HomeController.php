<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.home.HomeTemplate',[
            'title'=>'home page'
        ]);
    }
    public function print(){
        $pdf = PDF::loadView('user.home.HomeTemplate',['title'=>'print login']);
        return $pdf->download('mantap.pdf');
    }
}
