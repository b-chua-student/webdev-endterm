@extends('layouts.base')

@section('title', 'Order Management')

@section('content')
<h1>Order List</h1>

<table border="1">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->user->first_name }}</td>
            <td>₱{{ $order->total_price }}</td>
            <td>{{ $order->ordered_at->format('M d, Y') }}</td>
            <td><a href="{{ route('admin.orders.show', $order->id) }}">View Details</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></p>

@endsection