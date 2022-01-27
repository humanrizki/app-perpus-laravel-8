<?php
namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\HomeroomMessage;
use App\Models\ReplyHomeroomMessage;

class UserAgreementsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('user.agreement.index',[
            'title'=>'Show all Agreement'
        ]);
    }
    public function show(HomeroomMessage $homeroom_message){
        return view('user.agreement.show',[
            'title'=>'Show detail one Agreement',
            'message'=>ReplyHomeroomMessage::where('homeroom_message_id',$homeroom_message->id)->first()
        ]);
    }
}
