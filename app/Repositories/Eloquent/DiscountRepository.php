<?php

namespace App\Repositories\Eloquent;

use App\Models\Discount;
use App\Contracts\Repositories\DiscountRepositoryInterface;

class DiscountRepository implements DiscountRepositoryInterface
{
    public function getAll()
    {
        return Discount::latest()->paginate(10);
    }

    public function create(array $data)
    {
        return Discount::create($data);
    }

    public function update($id, array $data)
    {
        $discount = Discount::findOrFail($id);
        $discount->update($data);
        return $discount;
    }

    public function toggleStatus($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->is_active = !$discount->is_active;
        $discount->save();
        return $discount->is_active;
    }
}