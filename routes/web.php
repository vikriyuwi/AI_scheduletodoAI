<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPagesController as UPC;
use App\Http\Controllers\Auth;
use App\Http\Controllers\TaskManager;

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
    Route::get('login', [Auth::class,'index']);
    Route::post('login', [Auth::class,'login']);
});