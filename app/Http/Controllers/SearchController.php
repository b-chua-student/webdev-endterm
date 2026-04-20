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
        if ($routeName === 'test-search-users')
        {
            $rv = $this->getUsers($validated); // rv = Return Value
        } elseif ($routeName === 'test-search-products' || $routeName === 'product-listing' || $routeName === 'search-product')
        {
            $rv = $this->getProducts($validated);
        } elseif ($routeName === 'test-search-orders')
        {
            $rv = $this->getOrders($validated);
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
            'view' => 'tests.search',
            'data' => compact('users'),
        ];
    }

    public function getProducts(array $validated)
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
            'view' => 'tests.search',
            'data' => compact('orders'),
        ];
    }
}
