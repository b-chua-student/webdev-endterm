<?php

namespace App\Contracts\Services;
use Illuminate\Database\Eloquent\Collection;

interface SearchServiceInterface
{
    public function getUsers(string $query) : Collection;
    public function getProducts(string $query, ?float $minPrice = null, ?float $maxPrice = null) : Collection;
    public function getOrders(string $query) : Collection;
}

