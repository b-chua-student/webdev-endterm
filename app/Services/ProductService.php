<?php

namespace App\Services;

use App\Models\Product;
use App\Contracts\Services\ProductServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements ProductServiceInterface
{
    public function getProductById(int $id) : Product
    {
        return Product::findOrFail($id);
    }
}
