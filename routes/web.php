<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('register', fn () => response()->view('register')->withHeaders([
    'Cache-Control' => 'no-store, no-cache, must-revalidate',
    'Expires' => '0',
    ]))
    ->name('register')
    ->middleware('guest');

Route::post('register', [AuthController::class, 'register'])
    ->name('register-with-email')
    ->middleware(['throttle:10,1']);

Route::get('login', fn () => response()->view('tests.login')->withHeaders([
    'Cache-Control' => 'no-store, no-cache, must-revalidate',
    'Expires' => '0',
    ]))
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthController::class, 'loginByEmail'])
    ->name('login-user')
    ->middleware(['throttle:10,1']);

Route::post('login-guest', [AuthController::class, 'loginAsGuest'])->name('login-guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('home', fn () => response()->view('home')->withHeaders([
    'Cache-Control' => 'no-store, no-cache, must-revalidate',
    'Expires'       => '0',
]))
    ->name('home')
    ->middleware('auth');

Route::get('components', fn () => view('tests.components'))->name('components');

Route::fallback(fn () => redirect()->route('login'));

// Routes for testing views

Route::get('order-confirmation', fn() => view ('order-confirmation'))->name('order-confirmation');
Route::post('checkout', fn() => view('checkout'))->name('checkout');
Route::get('product-view', fn () => view('product-view'))->name('product-view');
Route::get('shopping-cart', fn() => view('shopping-cart'))->name('shopping-cart');
Route::get('product-listing', fn () => view('product-listing'))->name('product-listing');
