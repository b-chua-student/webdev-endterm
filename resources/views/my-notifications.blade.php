@extends('layouts.app')

@section('content')
    <h1 class="text-brand mb-4">Notifications</h1>

    <div class="notifications-list">
        {{-- Example notification items --}}
        <div class="notification-item border-brand p-3 mb-3 rounded">
            <h5 class="text-brand">Order Shipped</h5>
            <p>Your order #12345 has been shipped and is on its way!</p>
            <small class="text-muted">April 17, 2026</small>
        </div>

        <div class="notification-item border-brand p-3 mb-3 rounded">
            <h5 class="text-brand">Payment Received</h5>
            <p>We’ve received your payment for order #12345.</p>
            <small class="text-muted">April 16, 2026</small>
        </div>
    </div>
@endsection
