<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ListsController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/collections',[CollectionController::class,'index'])->name('collections');
Route::get('/lists/',[ListsController::class,'index'])->name('lists');
Route::get('/collections/{collection:slug}',[CollectionController::class,'show']);
