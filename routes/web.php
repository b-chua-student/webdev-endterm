<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('login'))->name('login');
Route::get('/shopping-cart', fn() => view('shopping-cart'))->name('shopping-cart');
Route::get('/checkout', fn() => view('checkout-page'))->name('checkout');
Route::get('/order-confirmation', fn() => view('order-confirmation'))->name('order-confirmation');
Route::get('/account', fn() => view('account'))->name('account');
Route::get('/user-profile', fn() => view('user-profile'))->name('user-profile');
Route::get('/about-us', fn() => view('about-us'))->name('about-us');
Route::get('/contact-us', fn() => view('contact-us'))->name('contact-us');
Route::get('/faq', fn() => view('faq'))->name('faq');
Route::get('/admin-dashboard', fn() => view('admin-dashboard'))->name('admin-dashboard');
Route::get('/orders-management', fn() => view('orders-management'))->name('orders-management');
Route::get('/orders-details', fn() => view('orders-details'))->name('orders-details');
Route::get('/inventory', fn() => view('inventory'))->name('inventory');

Route::get('/product-listing', [ProductController::class, 'listing'])->name('product-listing');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    $user = session('user');
    return view('home', compact('user'));
})->name('home');

Route::get('/product-details/{id}', [ProductController::class, 'details'])->name('product-details');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
