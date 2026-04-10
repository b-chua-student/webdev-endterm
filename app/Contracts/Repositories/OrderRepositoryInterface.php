<?php

namespace App\Contracts\Repositories;

interface OrderRepositoryInterface
{
    public function getPaginatedOrders();
    public function findById($id);
    public function updateStatus($id, string $status);
}