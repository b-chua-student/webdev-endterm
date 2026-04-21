@extends('layouts.user')

@section('title', 'Order Confirmation')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; padding: 60px 20px 100px; font-family: sans-serif; max-width: 1000px; margin: 0 auto; text-align: center;">

    <h1 style="font-size: 48px; font-weight: 200; color: #700101; margin-bottom: 10px;">Thank You!</h1>
    <p style="font-size: 18px; color: #700101; margin-bottom: 30px;">
        Your order <span style="font-weight: bold;">#{{ $order->id }}</span> has been placed!
    </p>

    <p style="font-size: 13px; color: #700101; max-width: 650px; line-height: 1.6; margin-bottom: 40px; font-style: italic;">
        A confirmation has been sent to {{ $order->email }}. You can track your order status below.
    </p>

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border: 1px solid #700101; border-radius: 4px; width: 100%; margin-bottom: 50px;">
        <div style="padding: 25px; border-right: 1px solid #700101; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px;">👤 Customer</div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                {{ $order->user->first_name }} {{ $order->user->last_name }}<br>
                {{ $order->email }}<br>
                {{ $order->user->phone_number }}
            </div>
        </div>
        <div style="padding: 25px; border-right: 1px solid #700101; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px;">💳 Billing Details</div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                Order #{{ $order->id }}<br>
                Status: {{ ucfirst($order->status) }}<br>
                {{ $order->ordered_at->format('M d, Y h:i A') }}
            </div>
        </div>
        <div style="padding: 25px; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px;">🚚 Shipping Method</div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                Standard Delivery<br>
                {{ $order->shipped_to }}<br>
                3-5 business days
            </div>
        </div>
    </div>

    <button style="background-color: #700101; color: white; padding: 15px 80px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; margin-bottom: 60px;">
        Track your order
    </button>

    <div style="width: 100%; text-align: center;">
        <h3 style="font-size: 14px; color: #700101; margin-bottom: 40px;">Order Summary</h3>

        <div style="max-width: 500px; margin: 0 auto 50px auto;">
            @foreach($order->items as $item)
            <div style="display: flex; gap: 20px; margin-bottom: 30px; align-items: center; text-align: left;">
                <img src="{{ asset('img/arwen.png') }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 4px;">
                <div style="flex-grow: 1;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #700101; font-weight: bold; font-size: 14px;">{{ $item->product->name }}</span>
                        <span style="color: #700101; font-size: 13px;">₱{{ number_format($item->unit_price, 2) }}</span>
                    </div>
                    <div style="color: #700101; font-size: 12px;">{{ $item->product->category->name }}</div>
                    <div style="color: #700101; font-size: 11px; margin-top: 10px;">#{{ $item->product->id }} | Qty: {{ $item->quantity }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="max-width: 500px; margin: 0 auto; border: 1px solid #700101; border-radius: 4px; padding: 30px; text-align: left;">
            <h4 style="color: #700101; font-size: 16px; font-weight: bold; text-align: center; margin-bottom: 20px;">Order Summary</h4>
            <div style="display: flex; flex-direction: column; gap: 10px; color: #700101; font-size: 14px; font-style: italic; margin-bottom: 25px;">
                <div style="display: flex; justify-content: space-between;"><span>Subtotal</span><span>₱{{ number_format($subtotal, 2) }}</span></div>
                <div style="display: flex; justify-content: space-between;"><span>Shipping</span><span>₱{{ number_format($shipping, 2) }}</span></div>
                <div style="display: flex; justify-content: space-between;"><span>Tax (12%)</span><span>₱{{ number_format($tax, 2) }}</span></div>
            </div>
            <div style="display: flex; justify-content: space-between; border-top: 1px solid #f0f0f0; padding-top: 15px;">
                <span style="color: #700101; font-weight: bold; font-size: 18px;">Total</span>
                <span style="color: #700101; font-weight: bold; font-size: 18px;">₱{{ number_format($total, 2) }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
