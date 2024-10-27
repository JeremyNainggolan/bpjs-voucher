<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login_post'])->name('login');

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerpost'])->name('register.post');
