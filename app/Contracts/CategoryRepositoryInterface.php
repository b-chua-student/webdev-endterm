<?php
namespace App\Contracts;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function findById(int $id): Category;
    public function findBySlug(string $slug): Category;
    public function getAll(): Collection;
    public function create(array $data): Category;
    public function update(int $id, array $data): Category;
    public function delete(int $id): bool;
}
