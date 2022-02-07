<?php

namespace App\Http\Controllers\User\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view('user.home.HomeTemplate',[
            'title'=>'home page'
        ]);
    }
}
