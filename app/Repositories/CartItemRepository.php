<?php
namespace App\Repositories;

use App\Contracts\CartItemRepositoryInterface;
use App\Models\CartItem;
use Illuminate\Support\Collection;

class CartItemRepository implements CartItemRepositoryInterface
{
    private function fakeCartItems(): array
    {
        return [
            ['id' => 1, 'cart_id' => 1, 'product_id' => 1, 'quantity' => 2, 'created_at' => '2024-01-01 00:00:00'],
        ];
    }

    public function findById(int $id): CartItem
    {
        $item = collect($this->fakeCartItems())->firstWhere('id', $id);
        return CartItem::make($item);
    }

    public function findByCartItemId(int $cartId): Collection
    {
        return collect($this->fakeCartItems())
            ->where('cart_id', $cartId)
            ->map(fn($item) => CartItem::make($item))
            ->values();
    }

    public function findByProductId(int $productId): Collection
    {
        return collect($this->fakeCartItems())
            ->where('product_id', $productId)
            ->map(fn($item) => CartItem::make($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeCartItems())->map(fn($item) => CartItem::make($item));
    }

    public function create(array $data): CartItem
    {
        return CartItem::make($data);
    }

    public function updateQuantity(int $id, int $quantity): CartItem
    {
        $item = collect($this->fakeCartItems())->firstWhere('id', $id);
        return CartItem::make(array_merge($item, ['quantity' => $quantity]));
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeCartItems())->contains('id', $id);
    }
}
