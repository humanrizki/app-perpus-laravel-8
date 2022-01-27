<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HomeroomMessage;
use App\Models\ReplyHomeroomMessage;
use Illuminate\Http\Request;

class DashboardAgreement extends Controller
{
    //
    public function index(){
        if(auth('admin')->user()->hasRole('homeroom')){
            return view('admin.agreement.index',[
                'title'=>'page agreement'
            ]);
        }
        abort(403,'THIS ACTION IS ANAUTHORIZED');
    }
    public function show(HomeroomMessage $message){
        if(auth('admin')->user()->id == $message->admin_id && auth('admin')->user()->hasRole('homeroom')){
            return view('admin.agreement.show',[
                'title'=>'detail agreement page',
                'message'=>$message
            ]);
        }   
        abort(403,'THIS ACTION IS UNAUTHORIZED');
    }
    public function store(HomeroomMessage $message, Request $request){
        $validatedData = $request->validate([
            'type'=>'required',
            'total'=>'required'
        ]);
        if($request->type == 'agree'){
            if($request->total >= $message->loan_report->forfeit){
                $statement = ( $request->reply == null) ? 'Walas anda setuju untuk memakai metode pembayaran menggunakan uang kas, temui walas dan bayarkan menggunakan uang kas anda!' : $request->reply;
                $message->update([
                    'status'=>'agree'
                ]);
                $message->loan_report->update([
                    'status'=>'request'
                ]);
                ReplyHomeroomMessage::create([
                    'homeroom_message_id'=>$message->id,
                    'reply_message'=>$statement,
                    'total_kas'=>$request->total
                ]);
                return redirect("/dashboard/agreements/{$message->slug}")->with('successWithMessage', 'Berhasil menambahkan persetujuan kedata peminjaman!');
            } else {
                return redirect("/dashboard/agreements/{$message->slug}")->with('errorWithMessage', 'Gagal karena jumlah uang kas kurang dari jumlah cost!');
            }
        } else {
            $statement = ( $request->reply == null) ? 'Walas anda tidak setuju untuk memakai metode pembayaran menggunakan uang kas, karena uang kas anda kurang!' : $request->reply;
            $message->update([
                'status'=>'disagree'
            ]);
            $message->loan_report->update([
                'status'=>'cancell'
            ]);
            ReplyHomeroomMessage::create([
                'homeroom_message_id'=>$message->id,
                'reply_message'=>$statement,
                'total_kas'=>$request->total
            ]);
            return redirect("/dashboard/agreements/{$message->slug}")->with('successWithMessage', 'Berhasil menambahkan persetujuan kedata peminjaman!');
        }
    }
}
