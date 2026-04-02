<?php

namespace App\Services;

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
}
