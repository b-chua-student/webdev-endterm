<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchUserRequest;
use App\Contracts\Services\SearchServiceInterface;

class SearchController extends Controller
{
    public function __construct(
        protected SearchServiceInterface $searchService
    ) {}

    public function index(SearchUserRequest $request)
    {
        $validated = $request->validated();

        $routeName = $request->route()->getName();
        if ($routeName === 'test-search-users' || $routeName === 'test-admin-user')
        {
            $rv = $this->getUsers($validated); // rv = Return Value
        } elseif ($routeName === 'test-search-products' || $routeName === 'search-product' || $routeName === 'product-listing' )
        {
            $rv = $this->searchProducts($validated);
        } elseif ($routeName === 'test-admin-product')
        {
            $rv = $this->getProducts($validated);
        } elseif ($routeName === 'test-search-orders' || $routeName === 'test-admin-order')
        {
            $rv = $this->getOrders($validated);
        } elseif ($routeName === 'test-admin-category')
        {
            $rv = $this->getCategory($validated);
        } else {
            return view('login');
        }

        return view($rv['view'], $rv['data']);
    }

    public function getUsers(array $validated)
    {
        $query = $validated['search'] ?? '';
        $users = $this->searchService->getUsers($query);

        return [
            'view' => 'admin.users.index',
            'data' => compact('users'),
        ];
    }

    public function searchProducts(array $validated)
    {
        $query = $validated['search'] ?? '';

        // Extract min and max price from the validated request data
        $minPrice = $validated['min_price'] ?? null;
        $maxPrice = $validated['max_price'] ?? null;

        // Pass all three arguments to your service
        $products = $this->searchService->getProducts($query, $minPrice, $maxPrice);

        return [
            'view' => 'product-listing',
            'data' => compact('products'),
        ];
    }

    public function getOrders (array $validated) {
        $query = $validated['search'] ?? '';
        $orders = $this->searchService->getOrders($query);

        return [
            'view' => 'admin.orders.index',
            'data' => compact('orders'),
        ];
    }

    public function getProducts (array $validated) {
        $query = '';
        $products = $this->searchService->getProducts($query);

        return [
            'view' => 'admin.products.index',
            'data' => compact('products'),
        ];
    }

    public function getCategory (array $validated) {
        $query = '';
        $category = $this->searchService->getCategory($query);

        return [
            'view' => 'admin.category.index',
            'data' => compact('category'),
        ];
    }
}
