<?php

namespace App\Services;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Contracts\Services\SearchServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class SearchService implements SearchServiceInterface
{
    public function getUsers(string $query) : Collection
    {
        return User::search(trim($query))
            ->get()
            ->filter(fn($user) => $user->email !== 'guest@guest'); // exclude displaying the guest account
    }

    public function getProducts(string $query) : Collection
    {
        return Product::search(trim($query))->get();
    }

    public function getOrders(string $query) : Collection
    {
        return Order::search(trim($query))->get();
    }
}
