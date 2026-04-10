<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use App\Services\ProductService;

class AdminController extends Controller
{
    protected $orderService;
    protected $productService;

    public function __construct(OrderService $orderService, ProductService $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    public function index()
    {
        // Fetch the data for the view 
        $recentOrders = $this->orderService->getAllOrders()->take(5);
        
        // Stats for the dashboard
        $stats = [
            'total_sales' => 0, 
            'pending_count' => $this->orderService->getAllOrders()->where('status', 'pending')->count(),
            'low_stock_count' => 0, 
        ];

        return view('admin.dashboard', compact('recentOrders', 'stats'));
    }
}