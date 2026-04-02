<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', fn () => view('login'))
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthController::class, 'loginByEmail'])
    ->name('login-user')
    ->middleware(['guest', 'throttle:10,1']);

Route::post('login-guest', [AuthController::class, 'loginAsGuest'])->name('login-guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', fn () => view('home'))->name('home');
