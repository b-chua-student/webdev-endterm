<?php
namespace App\Repositories;

use App\Contracts\CartRepositoryInterface;
use App\Models\Cart;
use Illuminate\Support\Collection;

class CartRepository implements CartRepositoryInterface
{
    private function fakeCart(): array
    {
        return [
            ['id' => 1, 'user_id' => 1, 'created_at' => '2024-01-01 00:00:00'],
        ];
    }

    public function findById(int $id): Cart
    {
        $item = collect($this->fakeCart())->firstWhere('id', $id);
        return Cart::make($item);
    }

    public function findByUserId(int $userId): Cart
    {
        $item = collect($this->fakeCart())->firstWhere('user_id', $userId);
        return Cart::make($item);
    }

    public function getAll(): Collection
    {
        return collect($this->fakeCart())->map(fn($item) => Cart::make($item));
    }

    public function create(array $data): Cart
    {
        return Cart::make($data);
    }

    public function update(int $id, array $data): Cart
    {
        $item = collect($this->fakeCart())->firstWhere('id', $id);
        return Cart::make(array_merge($item, $data));
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeCart())->contains('id', $id);
    }
}
