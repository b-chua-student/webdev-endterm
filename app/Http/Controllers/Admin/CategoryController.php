<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(CategoryService $service) 
    { 
        $this->service = $service; 
    }

    public function index()
    {
        $categories = $this->service->getAllCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $this->service->createCategory($request->validated());
        return redirect()->route('admin.categories.index')->with('success', 'Category Created');
    }

    public function destroy(int $id)
    {
        $this->service->deleteCategory($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category Deleted');
    }
}