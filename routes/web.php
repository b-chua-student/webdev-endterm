<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;

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

// Routes for testing views

Route::post('/order', [CheckoutController::class, 'store'])->name('order')->middleware('auth');
Route::get('/order-confirmation/{order}', [CheckoutController::class, 'confirmation'])->name('order-confirmation')->middleware('auth');
Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');

Route::get('product-view/{id}', [ProductController::class, 'showProductView'])
    ->name('product-view');

Route::get('/shopping-cart', [CartController::class, 'index'])->name('shopping-cart')->middleware('auth');

Route::get('/product-listing', [SearchController::class, 'index'])->name('product-listing');

Route::post('search-product', [SearchController::class, 'index'])
    ->name('search-product');

// Test routes for admin CRUD

Route::get('test-admin-user', [SearchController::class, 'index'])
    ->name('test-admin-user');
Route::get('test-admin-product', [SearchController::class, 'index'])
    ->name('test-admin-product');
Route::get('test-admin-order', [SearchController::class, 'index'])
    ->name('test-admin-order');
Route::get('test-admin-category', [SearchController::class, 'index'])
    ->name('test-admin-category');

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
// Route::resource('categories', CategoryController::class);

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/item/{id}', [CartController::class, 'remove'])->name('cart.remove')->middleware('auth');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard.index')->middleware('auth');

Route::get('about-us', fn () => view('about-us'))->name('about-us');
Route::get('faq', fn () => view('faq'))->name('faq');
