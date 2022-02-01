<?php

// use App\Http\Controllers\User\Auth\UserLoginController;

use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\Auth\UserForgotPassword;
use App\Http\Controllers\User\Others\ListsController;
use App\Http\Controllers\User\Others\LoanController;
use App\Http\Controllers\User\Others\ProfileController;
use App\Http\Controllers\User\Others\BucketController;
use App\Http\Controllers\User\Others\CollectionController;
use App\Http\Controllers\User\Others\ReturnController;
use App\Http\Controllers\User\Others\TransactionController;
use App\Http\Controllers\User\Others\UserAgreementsController;
use App\Http\Controllers\User\Others\UserTeacherController;
use App\Http\Controllers\Admin\Dashboard\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AdminForgotPassword;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use App\Http\Controllers\Admin\Dashboard\DashboardAgreement;
use App\Http\Controllers\Admin\Dashboard\DashboardBookcase;
use App\Http\Controllers\Admin\Dashboard\DashboardBooks;
use App\Http\Controllers\Admin\Dashboard\DashboardCategory;
use App\Http\Controllers\Admin\Dashboard\DashboardChart;
use App\Http\Controllers\Admin\Dashboard\DashboardCollection;
use App\Http\Controllers\Admin\Dashboard\DashboardLoans;
use App\Http\Controllers\Admin\Dashboard\DashboardReturn;
use App\Http\Controllers\Admin\Dashboard\DashboardStudents;
use App\Http\Controllers\Admin\Dashboard\DashboardTransaction;
use App\Models\DetailClassDepartment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\User\Home\HomeController::class, 'index'])->name('home');
Route::get('/agreements',[UserAgreementsController::class,'index'])->name('agreements');
Route::get('/agreements/{homeroom_message:slug}',[UserAgreementsController::class,'show'])->name('agreements');
Route::get('/collections',[CollectionController::class,'index'])->name('collections');
Route::get('/collections/{collection:slug}',[CollectionController::class,'show']);
Route::get('/lists',[ListsController::class,'index'])->name('lists');
Route::get('/lists/{list:slug}',[ListsController::class,'show']);
Route::post('/lists/{list:slug}',[ListsController::class,'store']);
Route::get('/profile',[ProfileController::class,'index'])->name('profile');
Route::get('/profile/{user:username}/edit',[ProfileController::class,'show']);
Route::post('/profile/{user:username}/edit',[ProfileController::class,'update']);
Route::get('/bucket',[BucketController::class,'index'])->name('bucket');
Route::delete('/bucket/{bucket:id}',[BucketController::class,'destroy']);
Route::get('/bucket/{bucket:slug}',[BucketController::class,'show']);
Route::get('/loan',[LoanController::class,'index'])->name('loan');
Route::get('/loan/{loan:slug}',[LoanController::class,'show']);
Route::put('/loan/{loan:slug}',[LoanController::class,'cancell']);
Route::delete('/loan/{loan:slug}',[LoanController::class,'delete']);
Route::get('/login',[UserLoginController::class,'index'])->name('login')->middleware('guest');
Route::get('/transaction',[TransactionController::class,'index'])->name('transaction');
Route::get('/transaction/{transaction:slug}',[TransactionController::class,'show']);
Route::get('/mantap',[TransactionController::class,'coba']);
Route::get('/teacher',[UserTeacherController::class,'index'])->name('teacher');
Route::get('/teacher/agreement/{user:username}',[UserTeacherController::class,'show'])->name('teacher');
Route::post('/login',[UserLoginController::class,'login']);
Route::post('/logout',[UserLoginController::class,'logout']);
Route::get('/register',[UserRegisterController::class,'index'])->name('register');
Route::post('/register',[UserRegisterController::class,'register']);
Route::get('/return',[ReturnController::class,'index'])->name('return');
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
Route::post('/admin/login',[AdminLoginController::class,'login']);
Route::post('/admin/logout',[AdminLoginController::class,'logout'])->name('logout.admin');
Route::get('/dashboard/books/checkSlug',[DashboardBooks::class,'checkSlug']);
Route::group(['middleware'=>'adminguest:admin'],function(){
    Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/categories', [DashboardCategory::class, 'index']);
    Route::get('/dashboard/collections', [DashboardCollection::class, 'index']);
    Route::get('/dashboard/bookcases', [DashboardBookcase::class, 'index']);
    Route::get('/dashboard/agreements',[DashboardAgreement::class,'index']);
    Route::get('/dashboard/agreements/{message:slug}',[DashboardAgreement::class,'show']);
    Route::post('/dashboard/agreements/{message:slug}',[DashboardAgreement::class,'store']);
    Route::get('/dashboard/returns',[DashboardReturn::class,'index']);
    Route::get('/dashboard/students',[DashboardStudents::class,'index']);
    Route::get('/dashboard/students/{user:username}',[DashboardStudents::class,'show']);
    Route::get('/dashboard/students/{user:username}/loans',[DashboardStudents::class,'loans']);
    Route::get('/dashboard/students/{user:username}/returns',[DashboardStudents::class,'returns']);
    Route::resource('/dashboard/books',DashboardBooks::class);
    Route::get('/dashboard/loans',[DashboardLoans::class,'index']);
    Route::get('/dashboard/loans/{loanReport:slug}',[DashboardLoans::class,'show']);
    Route::post('/dashboard/loans/{loanReport:slug}',[DashboardLoans::class,'store']);
    Route::get('/dashboard/transactions',[DashboardTransaction::class,'index']);
    Route::get('/dashboard/transactions/{transaction:slug}',[DashboardTransaction::class,'show']);
    Route::post('/dashboard/transactions/{transaction:slug}',[DashboardTransaction::class,'store']);
    Route::get('/dashboard/admin/profile',[AdminDashboardController::class,'profile']);
    Route::get('/dashboard/admin/profile/edit',[AdminDashboardController::class,'edit']);
    Route::post('/dashboard/admin/profile/edit',[AdminDashboardController::class,'update']);
    Route::get('/dashboard/lists/homeroom',[AdminDashboardController::class,'homeroom']);
    
});
Route::get('/dashboard/charts/students',[DashboardChart::class,'students']);
Route::get('/dashboard/chartjs',[DashboardChart::class,'chartPie']);
Route::get('/chart',function(){
    return view('chars');
});
Route::get('/data-chart',function(){
    $user = DB::table('users')->leftJoin('detail_class_departments','users.detail_class_department_id','detail_class_departments.id')
        ->leftJoin('departments','detail_class_departments.department_id','departments.id')
        ->leftJoin('class_users','detail_class_departments.class_user_id','class_users.id')
        ->select('name','class','department')->get();
        $department = $user->pluck('department');
    dd($user, $department,DetailClassDepartment::all(), array_count_values($user->where('department','Teknik Komputer & Jaringan 2')->pluck('department')->toArray())['Teknik Komputer & Jaringan 2']);
});
Route::get('/admin/register/homeroom',[AdminRegisterController::class,'create']);
Route::post('/admin/register/homeroom',[AdminRegisterController::class,'register']);
Route::get('/forgot-password',[UserForgotPassword::class, 'index']);
Route::post('/forgot-password',[UserForgotPassword::class, 'verification']);
Route::get('/reset-password/{forgot:token}',[UserForgotPassword::class, 'edit']);
Route::post('/reset-password/{forgot:token}',[UserForgotPassword::class, 'update']);
Route::get('admin/forgot-password',[AdminForgotPassword::class, 'index']);
Route::post('admin/forgot-password',[AdminForgotPassword::class, 'verification']);
Route::get('admin/reset-password/{forgot:token}',[AdminForgotPassword::class, 'edit']);
Route::post('admin/reset-password/{forgot:token}',[AdminForgotPassword::class, 'update']);