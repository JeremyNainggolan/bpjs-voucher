<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
    Route::post('/vouchers', [VoucherController::class, 'store'])->name('vouchers.store');
    Route::post('/vouchers/{voucher}/use', [VoucherController::class, 'use'])->name('vouchers.use');
});