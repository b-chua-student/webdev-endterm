<?php

namespace App\Contracts\Repositories;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function all();
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function getLowStock($threshold);
}

