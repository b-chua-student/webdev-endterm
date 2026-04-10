<?php

namespace App\Services;

use App\Repositories\Eloquent\OrderRepository;
use App\Jobs\OrderStatusUpdatedJob;
use App\Jobs\OrderCancelledJob;

class OrderService
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders()
    {
        return $this->orderRepository->getPaginatedOrders();
    }

    public function getOrderDetails($id)
    {
        return $this->orderRepository->findById($id);
    }

    public function updateStatus($id, $newStatus)
    {
        $order = $this->orderRepository->updateStatus($id, $newStatus);

        // Notify customer based on status
        if ($newStatus === 'cancelled') {
            OrderCancelledJob::dispatch($order);
        } else {
            OrderStatusUpdatedJob::dispatch($order);
        }

        return $order;
    }

}