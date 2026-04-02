<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Services\AuthServiceInterface;

class AuthService implements AuthServiceInterface
{
    public function loginByEmail(array $data) : bool
    {
        return Auth::attempt($data);
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

}
