<?php

namespace App\Contracts\Repositories;

interface DiscountRepositoryInterface
{
    public function getAll();
    public function create(array $data);
    public function update($id, array $data);
    public function toggleStatus($id);
}