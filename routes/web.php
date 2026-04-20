<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('register', fn () => response()->view('tests.register')->withHeaders([
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

Route::get('home', fn () => response()->view('tests.home')->withHeaders([
    'Cache-Control' => 'no-store, no-cache, must-revalidate',
    'Expires'       => '0',
]))
    ->name('home')
    ->middleware('auth');

Route::get('components', fn () => view('tests.components'))->name('components');

Route::get('test-search-products', [SearchController::class, 'index'])
    ->name('test-search-products');
Route::post('test-search-products', [SearchController::class, 'index'])
    ->name('test-search-products');

Route::get('test-search-orders', [SearchController::class, 'index'])
    ->name('test-search-orders');
Route::post('test-search-orders', [SearchController::class, 'index'])
    ->name('test-search-orders');

Route::get('test-search-users', [SearchController::class, 'index'])
    ->name('test-search-users');
Route::post('test-search-users', [SearchController::class, 'index'])
    ->name('test-search-users');

Route::fallback(fn () => redirect()->route('login'));
