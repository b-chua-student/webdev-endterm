<?php

namespace App\Contracts\Repositories;

interface CategoryRepositoryInterface
{
    public function all();
    public function create(array $data);
    public function delete(int $id);
}