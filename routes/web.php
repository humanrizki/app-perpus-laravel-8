<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DashboardAgreement;
use App\Http\Controllers\DashboardBookcase;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\DashboardBooks;
use App\Http\Controllers\DashboardCategory;
use App\Http\Controllers\DashboardCollection;
use App\Http\Controllers\DashboardLoans;
use App\Http\Controllers\DashboardReturn;
use App\Http\Controllers\DashboardStudents;
use App\Http\Controllers\DashboardTransaction;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserAgreementsController;
use App\Http\Controllers\UserTeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
    Route::get('/dashboard/register/homeroom',[AdminRegisterController::class,'register']);
});