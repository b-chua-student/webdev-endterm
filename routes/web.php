<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('login', fn () => response()->view('login')->withHeaders([
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

Route::fallback(fn () => redirect()->route('login'));


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Category Routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Product Routes 
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
});