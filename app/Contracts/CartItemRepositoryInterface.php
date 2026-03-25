<?php

namespace App\Contracts;

use App\Models\CartItem;
use Illuminate\Support\Collection;

interface CartItemRepositoryInterface
{
    // function_name(input paramater with type): return type;

    public function findById(int $id): CartItem;
    public function findByCartItemId(int $cartId): Collection;
    public function findByProductId(int $productId): Collection;
    public function getAll(): Collection;
    public function create(array $data): CartItem;
    public function updateQuantity(int $id, int $quantity): CartItem;
    public function delete(int $id): bool;
}

