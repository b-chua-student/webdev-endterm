<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderService->getOrderDetails($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        // Simple validation for status
        $request->validate([
            'status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled,refunded,failed'
        ]);

        $this->orderService->updateStatus($id, $request->status);

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}