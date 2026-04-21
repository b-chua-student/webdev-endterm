@extends('layouts.auth')

@section('title', 'Order Management')

@section('content')

<div class="d-flex">
    <div class="d-flex flex-column w-25 bg-brand min-vh-100 text-white">
        <x-admin-navbar />
    </div>
    <div>
        <p class="display-6"> Order Management </p>
        <x-admin-table :col="$orders" :arrayExclude="[]" />
    </div>
</div>

@endsection

