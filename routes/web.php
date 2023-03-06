<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserPagesController as UPC;
use App\Http\Controllers\AuthGoogleController;
use App\Http\Controllers\TodoManagementController;

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
    Route::get('/profile',[UPC::class,'profile'])->name('profile');
    Route::get('/tes', [UPC::class,'tes']);
    Route::prefix('/todo')->group(function() {
        Route::resource('/', TodoManagementController::class);
    });
});

Route::prefix('/auth')->group(function() {
    Route::get('/', [AuthGoogleController::class,'index'])->name('login');
    Route::get('google', [AuthGoogleController::class,'redirectToGoogle'])->name('login.google');
    Route::get('logout', [AuthGoogleController::class,'logout'])->name('logout');
    Route::get('google/callback',[AuthGoogleController::class, 'googleCallBack']);
});