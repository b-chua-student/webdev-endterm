<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\ProductServiceInterface;

class ProductController extends Controller
{
    public function __construct(
        protected ProductServiceInterface $productService
    ) {}

    public function index(Request $request, $id = null)
    {
        $routeName = $request->route()->getName();
        if ($routeName === 'product-view')
        {
            $rv = $this->getProductById($id); // rv = Return Value
        } else {
            return view('login');
        }

        return view($rv['view'], $rv['data']);
    }

    public function getProductById($id)
    {
        $product = $this->productService->getProductById($id);
        return [
            'view' => 'product-view',
            'data' => compact('product'),
        ];
    }
}
