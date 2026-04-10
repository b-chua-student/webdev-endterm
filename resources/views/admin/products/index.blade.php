@extends('layouts.base')

@section('title', 'Inventory Management')

@section('content')
<h1>Inventory & Product Management</h1>

<h3>Product List</h3>
<a href="{{ route('admin.products.create') }}"><button>Add Product</button></a>

<table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>₱{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td><a href="{{ route('admin.products.edit', $product->id) }}"><button>Edit</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>

<hr>

<h3>Categories</h3>
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="New Category Name">
    <button type="submit">Add Category</button>
</form>

<p><a href="{{ route('admin.dashboard') }}">Back to Dashboard</a></p>
@endsection