<?php

namespace App\Contracts;

use App\Models\Order;
use Illuminate\Support\Collection;

interface OrderRepositoryInterface
{
    // function_name(input paramater with type): return type;

    public function findById(int $id): Order;
    public function findByUserId(int $userId): Collection;
    public function findByEmail(string $email): Collection;
    public function findByStatus(string $status): Collection;
    public function getAll(): Collection;
    public function create(array $data): Order;
    public function update(int $id, array $data): Order;
    public function updateStatus(int $id, string $status): Order;
    public function delete(int $id): bool;
}
