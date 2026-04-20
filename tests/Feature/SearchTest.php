<?php

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    Category::factory(4)->create();
    User::factory(5)->create();
});

// Products
test('search products page loads with all products', function () {
    $products = Product::factory(5)->create();
    $response = $this->get(route('test-search-products'));
    $response->assertOk();
    $products->each(fn ($p) => $response->assertSee($p->name));
});

test('search products returns filtered results', function () {
    Product::factory()->create(['name' => 'Nike Shoes']);
    Product::factory()->create(['name' => 'Adidas Shirt']);
    $response = $this->post(route('test-search-products'), ['search' => 'Nike']);
    $response->assertOk();
    $response->assertSee('Nike Shoes');
    $response->assertDontSee('Adidas Shirt');
});

test('search products with empty query returns all products', function () {
    $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\TrimStrings::class);
    $products = Product::factory(3)->create();
    $response = $this->withoutMiddleware()->post(route('test-search-products'), ['search' => '']);
    $response->assertOk();
    $products->each(fn ($p) => $response->assertSee($p->name));
});

test('search products with no match returns no results', function () {
    Product::factory()->create(['name' => 'Nike Shoes']);
    $response = $this->post(route('test-search-products'), ['search' => 'zzznomatch']);
    $response->assertOk();
    $response->assertDontSee('Nike Shoes');
});

// Orders
test('search orders page loads with all orders', function () {
    $orders = Order::factory(5)->create();
    $response = $this->get(route('test-search-orders'));
    $response->assertOk();
});

test('search orders returns filtered results', function () {
    Order::factory()->create(['status' => 'pending']);
    Order::factory()->create(['status' => 'delivered']);
    $response = $this->post(route('test-search-orders'), ['status' => 'pending']);
    $response->assertOk();
});

test('search orders with empty query returns all orders', function () {
    Order::factory(3)->create();
    $response = $this->post(route('test-search-orders'), ['search' => ' ']);
    $response->assertOk();
});

test('search orders shows email and status', function () {
    $order = Order::factory()->create(['status' => 'pending']);
    $response = $this->get(route('test-search-orders'));
    $response->assertOk();
    $response->assertSee($order->email);
    $response->assertSee('pending');
});

// Users
test('search users page loads with all users', function () {
    User::factory(5)->create();
    $response = $this->get(route('test-search-users'));
    $response->assertOk();
});

test('search users returns filtered results', function () {
    User::factory()->create(['first_name' => 'John', 'email' => 'john@example.com']);
    User::factory()->create(['first_name' => 'Jane', 'email' => 'jane@example.com']);
    $response = $this->post(route('test-search-users'), ['search' => 'John']);
    $response->assertOk();
    $response->assertSee('John');
    $response->assertDontSee('Jane');
});

test('search users with empty query returns all users', function () {
    $users = User::factory(3)->create();
    $response = $this->call('POST', route('test-search-users'), ['search' => '']);
    $response->assertOk();
    $users->each(fn ($u) => $response->assertSee($u->first_name));
});

test('search users with no match returns no results', function () {
    User::factory()->create(['first_name' => 'John']);
    $response = $this->post(route('test-search-users'), ['search' => 'zzznomatch']);
    $response->assertOk();
    $response->assertDontSee('John');
});

test('search users shows email', function () {
    $user = User::factory()->create();
    $response = $this->get(route('test-search-users'));
    $response->assertOk();
    $response->assertSee($user->email);
});

// Fallback
test('unknown route redirects to login', function () {
    $response = $this->get('/unknown-route');
    $response->assertRedirect(route('login'));
});
