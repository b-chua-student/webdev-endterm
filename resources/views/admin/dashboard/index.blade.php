@extends('layouts.auth')
@section('title', 'Admin Dashboard')
@section('content')
<div class="d-flex">
    <div class="d-flex flex-column w-25 bg-brand min-vh-100 text-white">
        <x-admin-navbar />
    </div>

    <div class="flex-grow-1 p-4">
        <p class="display-6">Admin Dashboard</p>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h6 class="card-title">Total Users</h6>
                        <h2>{{ $data['totalUsers'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h6 class="card-title">Total Products</h6>
                        <h2>{{ $data['totalProducts'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h6 class="card-title">Total Orders</h6>
                        <h2>{{ $data['totalOrders'] }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h6 class="card-title">Total Revenue</h6>
                        <h2>₱{{ number_format($data['totalRevenue'], 2) }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Recent Orders</div>
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['recentOrders'] as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                                    <td>₱{{ number_format($order->total_amount, 2) }}</td>
                                    <td><span class="badge bg-info">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center">No orders yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Recent Users</div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            @forelse($data['recentUsers'] as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $user->name }}
                                <small class="text-muted">{{ $user->created_at->format('M d') }}</small>
                            </li>
                            @empty
                            <li class="list-group-item text-center">No users yet.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
