@extends('layouts.auth')
@section('title', 'Order Management')
@section('content')
<div class="d-flex min-vh-100">
    <div class="d-flex flex-column bg-brand text-white" style="width: 260px; flex-shrink: 0;">
        <x-admin-navbar />
    </div>
    <div class="flex-grow-1 p-5 bg-light" style="min-width: 0;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="display-6 text-brand fw-bold m-0">Order Management</p>
            <a href="{{ route('orders.create') }}" class="btn text-white fw-semibold"
               style="background-color: #7d0a0a; border-radius: 6px; padding: 10px 24px;">
                + Add Order
            </a>
        </div>
        <div class="bg-white rounded shadow-sm p-4">
            <x-admin-table
                :col="$orders"
                :arrayExclude="[]"
                editRoute="orders.edit"
                deleteRoute="orders.destroy"
            />
        </div>
    </div>
</div>
@endsection
