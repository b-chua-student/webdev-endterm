<?php

namespace App\Contracts\Services;

use Illuminate\Support\Collection;

interface AuthServiceInterface
{
    public function loginByEmail(array $data) : bool;
    public function loginByInstagram(array $data) : bool;
}
