<?php

namespace App\Contracts;

use App\Models\Cart;
use Illuminate\Support\Collection;

interface CartRepositoryInterface
{
    // function_name(input paramater with type): return type;

    public function findById(int $id): Cart;
    public function findByUserId(int $userId): Cart;
    public function getAll(): Collection;
    public function create(array $data): Cart;
    public function update(int $id, array $data): Cart;
    public function delete(int $id): bool;
}
