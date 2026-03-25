<?php
namespace App\Repositories;

use App\Contracts\OrderItemRepositoryInterface;
use App\Models\OrderItem;
use Illuminate\Support\Collection;

class OrderItemRepository implements CategoryRepositoryInterface
{
   private function fakeOrderItems(): array
    {
        return [
['id' => 1, 'order_id' => 101, 'product_id' => 201, 'quantity' => 2, 'unit_price' => 19.99, 'created_at' => '2024-01-03 00:00:00'],
['id' => 2, 'order_id' => 102, 'product_id' => 205, 'quantity' => 1, 'unit_price' => 49.99, 'created_at' => '2024-01-03 00:00:00'],
['id' => 3, 'order_id' => 101, 'product_id' => 210, 'quantity' => 3, 'unit_price' => 9.99, 'created_at' => '2024-01-03 00:00:00'],
['id' => 4, 'order_id' => 103, 'product_id' => 198, 'quantity' => 1, 'unit_price' => 129.99, 'created_at' => '2024-01-03 00:00:00'],
['id' => 5, 'order_id' => 104, 'product_id' => 202, 'quantity' => 4, 'unit_price' => 14.50, 'created_at' => '2024-01-03 00:00:00'],
        ];
    }

    public function findById(int $id): OrderItem
    {
        $item = collect($this->fakeOrderItems())->firstWhere('id', $id);
        return OrderItem::make($item);
    }

    public function findByOrderId(int $orderId): Collection
    {
        return collect($this->fakeOrderItems())
            ->where('order_id', $orderId)
            ->map(fn($item) => OrderItem::make($item))
            ->values();
    }

    public function findByProductId(int $productId): Collection
    {
        return collect($this->fakeOrderItems())
            ->where('product_id', $productId)
            ->map(fn($item) => OrderItem::make($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeOrderItems())
            ->map(fn($item) => OrderItem::make($item));
    }

    public function create(array $data): OrderItem
    {
        return OrderItem::make($data);
    }

    public function update(int $id, array $data): OrderItem
    {
        $items = collect($this->fakeOrderItems())
            ->map(fn($item) => $item['id'] === $id ? array_merge($item, $data) : $item);
        return OrderItem::make($items->firstWhere('id', $id));
    }

    public function updateQuantity(int $id, int $quantity): OrderItem
    {
        return $this->update($id, ['quantity' => $quantity]);
    }

    public function updateUnitPrice(int $id, float $unitPrice): OrderItem
    {
        return $this->update($id, ['unit_price' => $unitPrice]);
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeOrderItems())->contains('id', $id);
    }

    public function deleteByOrderId(int $orderId): bool
    {
        return collect($this->fakeOrderItems())->contains('order_id', $orderId);
    }

}


