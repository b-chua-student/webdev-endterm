@extends('layouts.withnavbar')
@section('title', $product->name)
@section('heading', $product->name)
@section('content')

<p><strong>Category ID:</strong> {{ $product->category_id }}</p>
<p><strong>Description:</strong> {{ $product->description }}</p>
<p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
<p><strong>Stock:</strong> {{ $product->stock }}</p>
<p><strong>Status:</strong> {{ $product->is_active ? 'Active' : 'Inactive' }}</p>
<p><strong>Slug:</strong> {{ $product->slug }}</p>

<a href="{{ route('product-listing') }}">Back to Products</a>

@endsection
