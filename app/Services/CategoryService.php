<?php

namespace App\Services;

use App\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryService
{
    protected $repo;

    public function __construct(CategoryRepositoryInterface $repo) 
    { 
        $this->repo = $repo; 
    }

    public function getAllCategories() 
    { 
        return $this->repo->all(); 
    }

    public function createCategory(array $data)
    {
        // Automatically generate slug from name
        $data['slug'] = Str::slug($data['name']); 
        return $this->repo->create($data);
    }

    public function deleteCategory(int $id) 
    { 
        return $this->repo->delete($id); 
    }
}