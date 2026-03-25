<?php
namespace App\Repositories;

use App\Contracts\ProductImageRepositoryInterface;
use App\Models\ProductImage;
use Illuminate\Support\Collection;

class ProductImageRepository implements ProductImageRepositoryInterface
{
    private function fakeProductImage(): array
    {
        return [
            ['id' => 1, 'product_id', 'url_large', 'url_medium', 'url_thumb', 'sort_order',
        ];
    }

    public function findById(int $id): ProductImage
    {
        $item = collect($this->fakeProductImage())->firstWhere('id', $id);
        return ProductImage::make($item);
    }

    public function findByProductId(int $productId): Collection
    {
        return collect($this->fakeProductImage())
            ->where('product_id', $productId)
            ->map(fn($item) => ProductImage::make($item))
            ->values();
    }

    public function getAll(): Collection
    {
        return collect($this->fakeProductImage())
            ->map(fn($item) => ProductImage::make($item));
    }

    public function create(array $data): ProductImage
    {
        return ProductImage::make($data);
    }

    public function update(int $id, array $data): ProductImage
    {
        $items = collect($this->fakeProductImage())
            ->map(fn($item) => $item['id'] === $id ? array_merge($item, $data) : $item);
        return ProductImage::make($items->firstWhere('id', $id));
    }

    public function updateSortOrder(int $id, int $sortOrder): ProductImage
    {
        return $this->update($id, ['sort_order' => $sortOrder]);
    }

    public function delete(int $id): bool
    {
        return collect($this->fakeProductImage())->contains('id', $id);
    }

    public function deleteByProductId(int $productId): bool
    {
        return collect($this->fakeProductImage())->contains('product_id', $productId);
    }
}
