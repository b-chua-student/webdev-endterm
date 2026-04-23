<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'totalUsers'    => User::count(),
            'totalProducts' => Product::count(),
            'totalOrders'   => Order::count(),
            'totalRevenue'  => Order::sum('total_amount'),
            'recentOrders'  => Order::latest()->take(10)->get(),
            'recentUsers'   => User::latest()->take(5)->get(),
        ];

        return view('admin.dashboard.index', compact('data'));
    }
}
