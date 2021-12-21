<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\BucketController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\DashboardBooks;
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
Route::post('/bucket/{bucket:slug}',[BucketController::class,'store']);
Route::get('/loan',[LoanController::class,'index'])->name('loan');
Route::get('/login',[UserLoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[UserLoginController::class,'login']);
Route::post('/logout',[UserLoginController::class,'logout']);
Route::get('/register',[UserRegisterController::class,'index'])->name('register');
Route::post('/register',[UserRegisterController::class,'register']);
Route::get('/admin/login',[AdminLoginController::class,'index'])->name('admin.login');
Route::post('/admin/login',[AdminLoginController::class,'login']);
Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
Route::post('/admin/logout',[AdminLoginController::class,'logout'])->name('logout.admin');
Route::get('/dashboard/books/checkSlug',[DashboardBooks::class,'checkSlug']);
Route::resource('/dashboard/books',DashboardBooks::class);