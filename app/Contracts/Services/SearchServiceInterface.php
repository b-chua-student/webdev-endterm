<?php

namespace App\Contracts\Services;
use Illuminate\Database\Eloquent\Collection;

interface SearchServiceInterface
{
    public function getUsers(string $query) : Collection;
    public function getProducts(string $query) : Collection;
    public function getOrders(string $query) : Collection;
}

