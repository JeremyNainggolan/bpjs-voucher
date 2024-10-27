<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/voucher', function () {
    return view('admin.generatetoken');
});

Route::get('/claim', function () {
    return view('users.claim-voucher');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login_post'])->name('login');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerpost'])->name('register.post');

// routes/web.php
// Route::get('/voucher', [AdminVoucherController::class, 'create'])->name('admin.voucher.create');
