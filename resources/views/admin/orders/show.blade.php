@extends('layouts.base')

@section('title', 'Order Details')

@section('content')
<h1>Order Details #{{ $order->id }}</h1>

<p><strong>Customer:</strong> {{ $order->user->first_name }} {{ $order->user->last_name }}</p>
<p><strong>Shipping Address:</strong> {{ $order->address }}</p>
<p><strong>Contact:</strong> {{ $order->user->email }}</p>

<h3>Items Purchased</h3>
<ul>
    @foreach($order->items as $item)
        <li>{{ $item->product->name }} (Qty: {{ $item->quantity }})</li>
    @endforeach
</ul>

<hr>

<h3>Order Processing</h3>
<p>Current Status: {{ ucfirst($order->status) }}</p>

<form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
    @csrf 
    @method('PATCH')
    <input type="hidden" name="status" value="approved">
    <button type="submit">Approve Order</button>
</form>

<form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
    @csrf 
    @method('PATCH')
    <input type="hidden" name="status" value="shipped">
    <button type="submit">Mark as Shipped</button>
</form>

<form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
    @csrf 
    @method('PATCH')
    <input type="hidden" name="status" value="refunded">
    <button type="submit">Refund</button>
</form>

<p><a href="{{ route('admin.orders.index') }}">Back to Orders</a></p>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@endsection