<?php

namespace App\Repositories\Eloquent;

use App\Models\Order;
use App\Contracts\Repositories\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function getPaginatedOrders($perPage = 15)
    {
        return Order::with('user')
            ->latest('ordered_at')
            ->paginate($perPage);
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $order->update(['status' => $status]);
        return $order;
    }

    public function findById($id)
    {
        return Order::with(['user', 'items.product'])->findOrFail($id);
    }
}