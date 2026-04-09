<?php

use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;

pest()->use(RefreshDatabase::class);

test('guest sees guest greeting on homepage', function () {
    $guest = User::factory()->create(['role' => 'guest']);

    $this->actingAs($guest)
        ->get('/home')
        ->assertSeeText('Hello, Guest');
});

test('authenticated user sees their name on homepage', function () {
    $user = User::factory()->create([
        'role' => 'user',
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    $this->actingAs($user)
        ->get('/home')
        ->assertSeeText('Hello, John Doe');
});
