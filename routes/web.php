<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('login');
});

Route::post('login', [AuthControllerInterface::class, 'loginByEmail'])
    ->name('login')
    ->middleware(['guest', 'throttle:10,1']);
Route::post('login-guest', [AuthControllerInterface::class, 'loginAsGuest'])->name('login-guest');

Route::get('home', fn () => view('home'))->name('home');
