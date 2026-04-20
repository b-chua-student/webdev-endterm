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

    public function getProducts(string $query, ?float $minPrice = null, ?float $maxPrice = null) : Collection
    {
        $term = '%' . trim($query) . '%';

        return Product::query()
            ->where(function ($q) use ($term) {
                $q->where('name', 'like', $term)
                  ->orWhere('description', 'like', $term)
                  ->orWhereHas('category', function ($categoryQuery) use ($term) {
                      $categoryQuery->where('name', 'like', $term);
                  });
            })
            ->when($minPrice, function ($q) use ($minPrice) {
                return $q->where('price', '>=', $minPrice);
            })
            ->when($maxPrice, function ($q) use ($maxPrice) {
                return $q->where('price', '<=', $maxPrice);
            })
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getOrders(string $query) : Collection
    {
        return Order::search(trim($query))->get();
    }
}
