<?php
namespace App\Contracts;

use App\Models\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function findById(int $id): Product;
    public function findBySlug(string $slug): Product;
    public function findByCategoryId(int $categoryId): Collection;
    public function findByIsActive(bool $isActive): Collection;
    public function getAll(): Collection;
    public function create(array $data): Product;
    public function update(int $id, array $data): Product;
    public function updateStock(int $id, int $stock): Product;
    public function updateIsActive(int $id, bool $isActive): Product;
    public function delete(int $id): bool;
}
