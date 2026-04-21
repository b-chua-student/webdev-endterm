@extends('layouts.auth')
@section('title', 'Edit Product')
@section('content')
<div class="d-flex min-vh-100">
    <div class="d-flex flex-column bg-brand text-white" style="width: 260px; flex-shrink: 0;">
        <x-admin-navbar />
    </div>
    <div class="flex-grow-1 p-5 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="display-6 text-brand fw-bold m-0">Edit Product</p>
            <a href="{{ route('test-admin-product') }}" class="btn btn-outline-secondary">← Back</a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger mb-4" style="max-width: 600px;">
                <ul class="m-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded shadow-sm p-4" style="max-width: 600px;">
            <x-item-edit-view
                :item="$product"
                update-route="products.update"
                :array-exclude="['id', 'created_at', 'updated_at', 'remember_token', 'password']"
                option-name="is_active"
                :options="['false' => 0, 'true' => 1]"
            />
        </div>
    </div>
</div>
@endsection
