<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPagesController as UPC;
use App\Http\Controllers\AuthGoogle;
use App\Http\Controllers\TodoManagement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/')->group(function() {
    Route::get('/',[UPC::class,'index'])->name('home');
    Route::get('/tes', [UPC::class,'tes']);
    Route::prefix('/todo')->group(function() {
        Route::resource('/', TodoManagement::class);
    });
});

Route::prefix('/auth')->group(function() {
    Route::get('/', [AuthGoogle::class,'index'])->name('login');
    Route::get('google', [AuthGoogle::class,'redirectToGoogle'])->name('login.google');
    Route::get('logout', [AuthGoogle::class,'logout'])->name('logout');
    Route::get('google/callback',[AuthGoogle::class, 'googleCallBack']);
});