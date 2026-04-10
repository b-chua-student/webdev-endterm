<?php

namespace App\Services;

use App\Repositories\Eloquent\DiscountRepository;

class DiscountService
{
    protected $repository;

    public function __construct(DiscountRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listDiscounts() 
    { 
        return $this->repository->getAll();   
    }
    
    public function createDiscount(array $data) 
    { 
        return $this->repository->create($data); 
    }

    public function updateDiscount($id, array $data) 
    { 
        return $this->repository->update($id, $data); 
    }

    public function deactivateDiscount($id) 
    { 
        return $this->repository->toggleStatus($id); 
    }
}