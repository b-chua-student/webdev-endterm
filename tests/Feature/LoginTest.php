<?php

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->uses(RefreshDatabase::class);

test('user can login with valid credentials', function () {
    $user = User::factory()->create_user()->create();

    $this->post('login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
});

test('user cannot login with invalid credentials', function () {
    $user = User::factory()->create_user()->create();

    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'wrongpassword',
    ])->assertSessionHasErrors(['invalid']);

    $response = $this->post('login', [
        'email' => 'wrong@email',
        'password' => 'password',
    ])->assertSessionHasErrors(['invalid']);
});

test('user cannot login with invalid email format', function () {
    $user = User::factory()->create_user()->create();

    $response = $this->post('login', [
        'email' => 'wrongemailformat',
        'password' => 'wrongpassword',
    ])->assertSessionHasErrors(['email']);
});

test('user cannot login with invalid password format', function () {
    $user = User::factory()->create_user()->create();

    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'pass', //password must have minimum of 8 characters
    ])->assertSessionHasErrors(['password']);
});

test('user is redirected to home after login', function () {
    $user = User::factory()->create_user()->create();

    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertRedirect(route('home'));
});

test('guest can login as guest', function () {
    $user = User::factory()->create_guest()->create();

    $this->post('login-guest');
    $this->assertAuthenticated();
});

test('guest is redirected to home after guest login', function () {
    $user = User::factory()->create_guest()->create();

    $response = $this->post('login-guest');

    $response->assertRedirect(route('home'));
});

test('unauthenticated user cannot access protected routes', function () {
    $this->get('/home')->assertRedirect(route('login'));
});

test('authenticated user cannot access login page', function () {
    $user = User::factory()->create_user()->create();

    $response = $this->post('login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $this->get('login')->assertRedirect(route('home'));
});
