<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all() 
    { 
        return Category::all(); 
    }

    public function create(array $data) 
    { 
        return Category::create($data); 
    }

    public function delete(int $id) 
    { 
        return Category::destroy($id); 
    }
}