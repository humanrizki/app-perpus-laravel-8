<?php

namespace App\Http\Controllers;

use App\Models\HomeroomMessage;
use App\Models\ReplyHomeroomMessage;
use Illuminate\Http\Request;

class UserAgreementsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('agreement.index',[
            'title'=>'Show all Agreement'
        ]);
    }
    public function show(HomeroomMessage $homeroom_message){
        return view('agreement.show',[
            'title'=>'Show detail one Agreement',
            'message'=>ReplyHomeroomMessage::where('homeroom_message_id',$homeroom_message->id)->first()
        ]);
    }
}
