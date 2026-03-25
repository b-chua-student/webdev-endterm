<?php
namespace App\Repositories;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    private function fakeProducts(): array
    {
    return [
        [
            'id'          => 1,
            'category_id' => 1,
            'name'        => 'Wireless Headphones',
            'description' => 'High quality wireless headphones with noise cancellation.',
            'price'       => 99.99,
            'stock'       => 15,
            'is_active'   => true,
            'slug'        => 'wireless-headphones',
            'created_at'  => '2024-01-01 00:00:00',
            'updated_at'  => '2024-01-01 00:00:00',
        ],
        [
            'id'          => 2,
            'category_id' => 2,
            'name'        => 'Running Shoes',
            'description' => 'Lightweight and comfortable running shoes.',
            'price'       => 59.99,
            'stock'       => 8,
            'is_active'   => true,
            'slug'        => 'running-shoes',
            'created_at'  => '2024-01-02 00:00:00',
            'updated_at'  => '2024-01-02 00:00:00',
        ],
        [
            'id'          => 3,
            'category_id' => 3,
            'name'        => 'Coffee Maker',
            'description' => 'Brew perfect coffee every morning.',
            'price'       => 49.99,
            'stock'       => 0,
            'is_active'   => false,
            'slug'        => 'coffee-maker',
            'created_at'  => '2024-01-03 00:00:00',
            'updated_at'  => '2024-01-03 00:00:00',
        ],
        [
            'id'          => 4,
            'category_id' => 2,
            'name'        => 'Backpack',
            'description' => 'Durable backpack for everyday use.',
            'price'       => 39.99,
            'stock'       => 25,
            'is_active'   => true,
            'slug'        => 'backpack',
            'created_at'  => '2024-01-04 00:00:00',
            'updated_at'  => '2024-01-04 00:00:00',
        ],
    ];
    }

    public function findById(int $id): Product
    {
        $item = collect($this->fakeProducts())->firstWhere('id', $id);
        return new Product($item);
    }

    public function findBySlug(string $slug): Product
    {
        $item = collect($this->fakeProducts())->firstWhere('slug', $slug);
        return new Product($item);
    }

    public function findByCategoryId(int $categoryId): Collection
    {
        return collect($this->fakeProducts())
            ->where('category_id', $categoryId)
            ->map(fn($item) => new Product($item))
            ->values();
    }

    public function findByIsActive(bool $isActive): Collection
    {
        return collect($this->fakeProducts())
            ->where('is_active', $isActive)
            ->map(fn($item) => new Product($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeProducts())
            ->map(fn($item) => new Product($item));
    }

    public function create(array $data): Product
    {
        return new Product($data);
    }

    public function update(int $id, array $data): Product
    {
        $item = collect($this->fakeProducts())->firstWhere('id', $id);
        return new Product(array_merge($item, $data));
    }

    public function updateStock(int $id, int $stock): Product
    {
        $item = collect($this->fakeProducts())->firstWhere('id', $id);
        return new Product(array_merge($item, ['stock' => $stock]));
    }

    public function updateIsActive(int $id, bool $isActive): Product
    {
        $item = collect($this->fakeProducts())->firstWhere('id', $id);
        return new Product(array_merge($item, ['is_active' => $isActive]));
    }

    public function delete(int $id): bool
    {
        return true;
    }
}
