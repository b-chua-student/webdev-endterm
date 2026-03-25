<?php
namespace App\Repositories;

use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    private function fakeCategory(): array
    {
        return [
            ['id' => 1, 'name' => 'Electronics',  'slug' => 'electronics',  'created_at' => '2024-01-03 00:00:00'],
            ['id' => 2, 'name' => 'Clothing',      'slug' => 'clothing',      'created_at' => '2024-01-03 00:00:00'],
            ['id' => 3, 'name' => 'Home & Garden', 'slug' => 'home-garden',   'created_at' => '2024-01-03 00:00:00'],
            ['id' => 4, 'name' => 'Sports',        'slug' => 'sports',        'created_at' => '2024-01-03 00:00:00'],
            ['id' => 5, 'name' => 'Books',         'slug' => 'books',         'created_at' => '2024-01-03 00:00:00'],
        ];
    }

    public function findById(int $id): Category
    {
        $item = collect($this->fakeCategory())->firstWhere('id', $id);
        return Category::make($item);
    }

    public function findBySlug(string $slug): Category
    {
        $item = collect($this->fakeCategory())->firstWhere('slug', $slug);
        return Category::make($item);
    }

    public function getAll(): Collection
    {
        return collect($this->fakeCategory())
            ->map(fn($item) => Category::make($item));
    }

    public function create(array $data): Category
    {
        return Category::make($data);
    }

    public function update(int $id, array $data): Category
    {
        $items = collect($this->fakeCategory())
            ->map(fn($item) => $item['id'] === $id ? array_merge($item, $data) : $item);
        return Category::make($items->firstWhere('id', $id));
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeCategory())->contains('id', $id);
    }
}
