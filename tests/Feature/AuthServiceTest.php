<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\AuthService;

pest()->uses(RefreshDatabase::class);

beforeEach(function () {
    $this->authService = new AuthService();
});

test('valid credentials return true', function () {
    $user = User::factory()->create_user()->create();

    $result = $this->authService->loginByEmail([
        'email' => $user->email,
        'password' => 'password'
    ]);

    expect($result)->toBeTrue();
});

test('invalid credentials return false', function () {
    $user = User::factory()->create_user()->create();

    $result = $this->authService->loginByEmail([
        'email' => 'wrong@email',
        'password' => 'wrongpassword'
    ]);

    expect($result)->toBeFalse();
});
