<?php

namespace App\Contracts;

use App\Models\OrderItem;
use Illuminate\Support\Collection;

interface OrderItemRepositoryInterface
{
    // function_name(input paramater with type): return type;

    public function findById(int $id): OrderItem;
    public function findByOrderId(int $orderId): Collection;
    public function findByProductId(int $productId): Collection;
    public function getAll(): Collection;
    public function create(array $data): OrderItem;
    public function update(int $id, array $data): OrderItem;
    public function updateQuantity(int $id, int $quantity): OrderItem;
    public function updateUnitPrice(int $id, int $unitPrice): OrderItem;
    public function delete(int $id): bool;
    public function deleteByOrderId(int $orderId): bool;
}

