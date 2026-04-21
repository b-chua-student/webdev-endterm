<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function loginByEmail(array $credentials): bool
    {
        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return true;
        }
        return false;
    }

    public function loginByInstagram(array $data) : bool
    {
        return false;
    }

    public function logout(Request $request) : void
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function createUser(array $data) : User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => Hash::make($data['password']),
        ]);
    }
}
