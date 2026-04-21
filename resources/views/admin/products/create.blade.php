@extends('layouts.auth')
@section('title', 'Create Product')
@section('content')
<div class="d-flex min-vh-100">
    <div class="d-flex flex-column bg-brand text-white" style="width: 260px; flex-shrink: 0;">
        <x-admin-navbar />
    </div>
    <div class="flex-grow-1 p-5 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="display-6 text-brand fw-bold m-0">Create Product</p>
            <a href="{{ route('test-admin-product') }}" class="btn btn-outline-secondary">← Back</a>
        </div>
        <div class="bg-white rounded shadow-sm p-4" style="max-width: 600px;">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Description</label>
                    <textarea name="description" rows="3"
                              class="form-control" style="border-color: #7d0a0a;">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Price</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Category</label>
                    <select name="category_id" class="form-select" style="border-color: #7d0a0a;">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Image</label>
                    <input type="file" name="image" accept="image/*"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="m-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn w-100 text-white fw-semibold"
                        style="background-color: #7d0a0a; border-radius: 6px; padding: 10px;">
                    Create Product
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
