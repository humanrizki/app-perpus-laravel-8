<?php

namespace App\Http\Livewire;

use App\Mail\HomeroomMail;
use App\Models\Admin;
use App\Models\Bucket;
use App\Models\HomeroomMessage;
use App\Models\LoanReport;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Uuid;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class UserBucket extends Component
{
    public $type;
    public $bucket;
    public $cost = 0;
    public $costP = true;
    public $loan_date;
    public $return_date;
    public $typeP;
    public function render ()
    {
        $this->loan_date = Carbon::now()->format('Y-m-d');
        if(!is_null($this->return_date)){
            if(Carbon::parse($this->return_date) < Carbon::parse($this->loan_date)){
                $this->costP = false;
                $this->loan_date = Carbon::now()->format('Y-m-d');
            } else {
                $this->costP = true;
                $this->loan_date = Carbon::now()->format('Y-m-d');
                $this->cost = (Carbon::parse(Carbon::now('Asia/Jakarta'))->diffInDays($this->return_date) < 7) ? 0 : 500 * (Carbon::parse(Carbon::now('Asia/Jakarta'))->diffInDays($this->return_date) - 7);
            }
        }
        if($this->type == 'kas'){
            $this->typeP = 'Jika memakai metode uang kas akan butuh waktu sampai mendapat persetujuan dari walas';
        } else {
            $this->typeP = null;
        }
        return view('livewire.user-bucket');
    }
    public function storeLoan(){
        $this->validate($this->rules());
        if(Carbon::now('Asia/Jakarta')->hour <= 15 && Carbon::now('Asia/Jakarta')->hour >= 7){
            if($this->type == 'kas'){
                $admin = Admin::where('detail_class_department_id',auth()->user()->detail_class_department_id)->first();
                if($admin){
                    $title = $this->bucket->book->title;
                    $details = [
                        'title'=>'Mail from Library CN',
                        'body'=>'Salah satu murid anda bernama '.auth()->user()->name." request untuk meminjam buku dengan metode pembayaran menggunakan uang kas.\n Apakah anda setuju?",
                        'link'=>''
                    ];
                    $slug = Uuid::uuid();
                    $details['link'] = url('/dashboard/agreements');
                    Mail::to($admin->email)->send(new HomeroomMail($details));
                    $stock = $this->bucket->book->stock -1;
                    $this->bucket->book->update([
                        'stock'=>$stock
                    ]);
                    $loan = LoanReport::create([
                        'loan_date'=>Carbon::parse($this->loan_date)->setTimeZone('Asia/Jakarta'),
                        'return_date'=>Carbon::parse($this->return_date)->setTimezone('Asia/Jakarta'),
                        'forfeit'=>$this->cost,
                        'book_id'=>$this->bucket->book->id,
                        'user_id'=>auth()->user()->id,
                        'admin_id'=>$this->bucket->book->admin_id,
                        'slug'=>Uuid::uuid(),
                        'status'=>'pending'
                    ]);
                    
                    HomeroomMessage::create([
                        'loan_report_id'=>$loan->id,
                        'status'=>'pending',
                        'message'=>$details['body'],
                        'admin_id'=>$admin->id,
                        'slug'=>$slug
                    ]);
                    Bucket::destroy($this->bucket->id);
                    $this->resetFields();
                    return redirect()->route("bucket")->with('addToLoan','Data bucket berhasil ditambah ke peminjaman untuk buku '.$title.', tetapi anda harus menunggu sampai walas anda setuju dengan metode pembayaran uang kas!');
                } else {
                    return redirect("/bucket/{$this->bucket->slug}")->with('errorToLoan','Data dari kelas anda tidak memiliki wali kelas untuk sekarang, jadi anda hanya bisa untuk memakai metode tunai pribadi!');
                }
            } else {
                $title = $this->bucket->book->title;
                $stock = $this->bucket->book->stock -1;
                $this->bucket->book->update([
                    'stock'=>$stock
                ]);
                LoanReport::create([
                    'loan_date'=>Carbon::parse($this->loan_date)->setTimeZone('Asia/Jakarta'),
                    'return_date'=>Carbon::parse($this->return_date)->setTimezone('Asia/Jakarta'),
                    'forfeit'=>$this->cost,
                    'book_id'=>$this->bucket->book->id,
                    'user_id'=>auth()->user()->id,
                    'admin_id'=>$this->bucket->book->admin_id,
                    'slug'=>Uuid::uuid(),
                    'type'=>'tunai'
                ]);
                Bucket::destroy($this->bucket->id);
                $this->resetFields();
                return redirect()->route("bucket")->with('addToLoan','Data bucket berhasil ditambah ke peminjaman untuk buku '.$title.'!');
            }
        } else {
            $title = $this->bucket->book->title;
            return redirect('/bucket/'.$this->bucket->slug)->with('errorToLoan','Data bucket gagal ditambahkan ke peminjaman untuk buku '.$title.' karena jam operasional sudah habis!');
        }
    }
    public function resetFields(){
        $this->type = null;
        $this->typeP = null;
        $this->cost = null;
        $this->costP = true;
        $this->loan_date = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $this->return_date = null;
    }
    protected function rules(){
        return [
            'type'=>'required',
            'return_date'=>'required'
        ];
    }
}
