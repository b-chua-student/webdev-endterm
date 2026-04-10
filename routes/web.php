<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\AdminController;

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




// All Admin Management Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Category Routes
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Product Routes 
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create'); // ADD THIS
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit'); // ADD THIS
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

    // Order Management Routes 
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::patch('orders/{id}/status', [OrderController::class, 'update'])->name('orders.update-status');
    
    // Discount
    Route::get('discounts', [DiscountController::class, 'index'])->name('discounts.index');
    Route::get('discounts/create', [DiscountController::class, 'create'])->name('discounts.create');
    Route::post('discounts', [DiscountController::class, 'store'])->name('discounts.store');
    Route::patch('discounts/{id}/toggle', [DiscountController::class, 'toggle'])->name('discounts.toggle');
});

Route::fallback(fn () => redirect()->route('login'));