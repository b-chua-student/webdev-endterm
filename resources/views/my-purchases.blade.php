@extends('layouts.app')

@section('content')
    <h1 class="text-brand mb-4">My Purchases</h1>

    <div class="purchase-list d-flex flex-wrap gap-4">
        {{-- Example purchase cards --}}
        <div class="purchase-card border-brand p-3 rounded">
            <img src="{{ asset('images/product1.jpg') }}" alt="Product 1" class="img-size-thumbnail mb-2">
            <h5 class="text-brand">Wireless Headphones</h5>
            <p>₱2,499 — Delivered on April 10, 2026</p>
            <button class="button-brand px-3 py-2">View Details</button>
        </div>

        <div class="purchase-card border-brand p-3 rounded">
            <img src="{{ asset('images/product2.jpg') }}" alt="Product 2" class="img-size-thumbnail mb-2">
            <h5 class="text-brand">Smartwatch</h5>
            <p>₱3,999 — Delivered on April 5, 2026</p>
            <button class="button-brand px-3 py-2">View Details</button>
        </div>
    </div>
@endsection
