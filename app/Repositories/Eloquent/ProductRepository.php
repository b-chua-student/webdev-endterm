<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function all()
    {
        return $this->model->with(['category', 'images'])->latest()->get();
    }

    public function findById($id)
    {
        return $this->model->with(['category', 'images'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->findById($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }

    public function getLowStock($threshold = 10)
    {
        return $this->model->where('stock', '<=', $threshold)->get();
    }
}