<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::post('login', [AuthController::class, 'loginByEmail'])
    ->name('login-user')
    ->middleware(['guest', 'throttle:10,1']);

Route::post('login-guest', [AuthController::class, 'loginAsGuest'])->name('login-guest');

Route::get('home', fn () => view('home'))->name('home');
