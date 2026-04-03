<?php

use App\Models\User;

uses(Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user is logged out and session is invalidated', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('logout');

    $this->assertGuest();
    $response->assertRedirect(route('login'));
});

test('logged out user cannot access protected routes', function () {
    $user = User::factory()->create();
    $response = $this->actingAs($user)->post('logout');

    $response = $this->get('home')->assertRedirect(route('login'));
});

 test('unauthenticated user cannot access logout', function () {
    $response = $this->post('/logout');
    $response->assertRedirect(route('login'));
});

test('user is authenticated before logout', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $this->assertAuthenticated();
});
