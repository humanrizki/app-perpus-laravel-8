<?php

namespace App\Http\Controllers\User\Others;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Department;
use App\Models\ClassUser;
use App\Models\LoanReport;
use App\Models\DetailClassDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index(){
        return view('user.profile.index',[
            'title'=>'profie',
            'user'=>auth('web')->user()
        ]);
    }
    public function show(User $user){
        if($user->id == auth()->user()->id){
            $title = $user->nisn == null ? 'upgrade to member!' : 'edit data!';
            return view('user.profile.show',[
                'title'=>$title,
                'user'=>$user,
                'departments'=> Department::all(),
                'class_users'=> ClassUser::all()
            ]);
        } else {
            return redirect()->route('profile');
        }
    }
    public function update(User $user,Request $request){
        if(is_null($user->nisn)){
            $data_validated = $request->validate([
                'nisn'=>'required|max:10|unique:users',
                'gender'=>'required',
                'phone'=>'required|regex:/(08)[0-9]{2}-[0-9]{4}-[0-9]{4,5}/',
            ]);
            $user->nisn = $data_validated['nisn'];
            $user->gender = $data_validated['gender'];
            $user->phone = $data_validated['phone'];
            $user->save();
        } else {
            $rules = [
                'name'=>'required|min:5|max:50',
                'username'=>'required|min:5|max:30',
                'email'=>'required|email:dns',
                'password'=>'required|min:8',
                'nisn'=>'required|max:10',
                'gender'=>'required',
                'phone'=>'required|max:14',
                'department'=>'required',
                'class_user'=>'required'
            ];
            $detail = DetailClassDepartment::where(function($query) use ($request){
                $query->where('class_user_id',$request['class_user'])->where('department_id',$request['department']);
            })->first();
            if(auth()->user()->nisn != $request->nisn){
                $rules[] = ['nisn'=>'required|max:10|unique:users'];
            }
            $data_validated = Validator::make($request->all(),$rules)->validate();
            auth()->user()->update([
                'name'=> $data_validated['name'],
                'username'=> $data_validated['username'],
                'email'=> $data_validated['email'],
                'password'=> Hash::make($data_validated['password']),
                'nisn'=> $data_validated['nisn'],
                'gender'=> $data_validated['gender'],
                'phone'=> $data_validated['phone'],
                'detail_class_department_id'=> $detail->id,
            ]);
            return redirect('/profile');
        }
        return redirect()->route('profile');
    }
    public function destroy(User $user, Request $request){
        if(LoanReport::where('user_id',$user->id)->get()->count() == null){
            User::destroy($user->id);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('login')->with('successToDeleteAccount','Berhasil menghapus akun anda!');
        } else {
            return redirect()->back()->with('failedToDeleteAccount','Gagal menghapus akun karena anda masih memiliki sebuah permintaan, atau sedang meminjam sebuah buku. Selesaikan itu dan baru bisa untuk menghapus akun!');
        }
    }
}
