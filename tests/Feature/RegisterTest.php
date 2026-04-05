<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->uses(RefreshDatabase::class);

beforeEach(function () {
    $this->validUserData = [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];
});

test('registers a user with valid data', function () {
    $response = $this->post('register', $this->validUserData)
        ->assertRedirect(route('home'));

    $this->assertDatabaseHas('users', [
            'email' => 'john@example.com'
        ]);
});

test('requires an email', function () {
    $response = $this->post('register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertSessionHasErrors('email');
});

test('requires a password', function () {
    $response = $this->post('register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'password',
    ])
        ->assertSessionHasErrors('password');

    $response = $this->post('register', [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password_confirmation' => 'password',
    ])
        ->assertSessionHasErrors('password');
});

test('requires a name', function () {
    $response = $this->post('register', [
        'first_name' => 'John',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertSessionHasErrors('last_name');

    $response = $this->post('register', [
        'last_name' => 'Doe',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ])
        ->assertSessionHasErrors('first_name');
});

test('rejects duplicate email', function () {

    // Both data is valid but has duplicate email

    $response = $this->post('register', $this->validUserData); // Create new user

    $duplicateUser = [
        'first_name' => 'Jonathan',
        'last_name' => 'Dela Cruz',
        'email' => 'john@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->post('register', $duplicateUser) // Create another user with duplicate email
        ->assertSessionHasErrors('email');
});

test('hashes the password', function () {
    $response = $this->post('register', $this->validUserData);

    $user = User::where('email', 'john@example.com')->first();

    expect(Hash::check('password', $user->password))->toBeTrue();
});

test('created user is immediately logged in', function () {
    $response = $this->post('register', $this->validUserData)
        ->assertRedirect(route('home'));

    $this->assertAuthenticated();
});
