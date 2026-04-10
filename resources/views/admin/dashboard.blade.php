@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard</h1>

<h3>Statistics</h3>
<ul>
    <li>Total Sales Today: ₱{{ $stats['total_sales'] ?? '0.00' }}</li>
    <li>Pending Orders: {{ $stats['pending_count'] ?? 0 }}</li>
    <li>Low-Stock Alerts: {{ $stats['low_stock_count'] ?? 0 }}</li>
</ul>

<hr>

<h3>Recent Activity (Last 5 orders)</h3>
<table border="1">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recentOrders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->user->first_name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->ordered_at->format('M d, Y') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<h3>Sales Chart</h3>
<div style="border: 1px solid black; height: 100px; width: 300px;">
    [Visual: Revenue over last 5 days]
</div>

<p><a href="{{ route('admin.orders.index') }}">View All Orders</a> | <a href="{{ route('admin.products.index') }}">Manage Inventory</a></p>
@endsection