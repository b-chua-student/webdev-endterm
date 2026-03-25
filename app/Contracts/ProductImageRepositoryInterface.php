<?php
namespace App\Contracts;

use App\Models\ProductImage;
use Illuminate\Support\Collection;

interface ProductImageRepositoryInterface
{
    public function findById(int $id): ProductImage;
    public function findByProductId(int $productId): Collection;
    public function getAll(): Collection;
    public function create(array $data): ProductImage;
    public function update(int $id, array $data): ProductImage;
    public function updateSortOrder(int $id, int $sortOrder): ProductImage;
    public function delete(int $id): bool;
    public function deleteByProductId(int $productId): bool;
}
