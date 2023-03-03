<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPagesController as UPC;
use App\Http\Controllers\Auth;

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
    Route::get('/', function () {
        return view('tes');
    });
    Route::prefix('/template')->group(function() {
        Route::get('/', [UPC::class,'template']);
    });
    Route::prefix('/task')->group(function() {
        Route::resource('/', TaskManager::class);
    });
});

Route::prefix('/auth')->group(function() {
    Route::get('/', [AuthGoogle::class,'index']);
    Route::get('google', [AuthGoogle::class,'redirectToGoogle'])->name('login.google');
    Route::post('login', [AuthGoogle::class,'login']);
});