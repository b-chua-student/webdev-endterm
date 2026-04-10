<?php

namespace App\Services;

use App\Contracts\Repositories\ProductRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function createProduct(array $data)
    {
        // Slugs for URLs
        $data['slug'] = Str::slug($data['name']);

        // is_active status
        $data['is_active'] = $data['is_active'] ?? true;

        // Create the product
        $product = $this->productRepo->create($data);

        // Handle Multi-resolution Images
        if (isset($data['product_images'])) {
            $this->processImages($product, $data['product_images']);
        }

        return $product;
    }

    protected function processImages($product, array $images)
    {
        foreach ($images as $index => $image) {
            $filename = time() . '_' . $index . '.' . $image->extension();
            
            $product->images()->create([
                'url_large'  => $image->storeAs('products/large', $filename, 'public'),
                'url_medium' => $image->storeAs('products/medium', $filename, 'public'),
                'url_thumb'  => $image->storeAs('products/thumb', $filename, 'public'),
                'sort_order' => $index
            ]);
        }
    }

    public function getAllProducts()
    {
        return $this->productRepo->all();
    }

}