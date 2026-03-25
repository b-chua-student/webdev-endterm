@extends('layouts.withnavbar')

@section('title', 'Product Listing')

@section('heading', 'Product Listing')

@section('content')
<div class="product-grid">
    @forelse($products as $product)
        <div class="product-card">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
            <a href="{{ route('product-details', $product->id) }}">View Details</a>
        </div>
    @empty
        <p>No active products found.</p>
    @endforelse
</div>
@endsection

