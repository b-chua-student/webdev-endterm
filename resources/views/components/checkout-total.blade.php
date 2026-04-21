@props(['items', 'subtotal', 'shipping', 'tax', 'total'])

<div style="width: 100%;">
    <h2 style="font-size: 42px; font-weight: 200; color: #700101; margin-bottom: 45px; letter-spacing: 1px;">Cart Total</h2>
    <div style="margin-bottom: 40px;">
        @foreach($items as $item)
        <div style="display: flex; gap: 20px; margin-bottom: 25px; align-items: flex-start;">
            <img src="{{ asset('img/arwen.png') }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px;">
            <div style="flex-grow: 1; padding-top: 5px;">
                <div style="display: flex; justify-content: space-between; align-items: baseline;">
                    <span style="color: #700101; font-weight: 700; font-size: 15px;">{{ $item->product->name }}</span>
                    <span style="color: #700101; font-size: 12px;">₱{{ number_format($item->product->price, 2) }}</span>
                </div>
                <div style="color: #700101; font-size: 13px; margin-top: 2px;">{{ $item->product->category->name }}</div>
                <div style="color: #700101; font-size: 12px; margin-top: 15px;">#{{ $item->product->id }} | Qty: {{ $item->quantity }}</div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="border-top: 1px solid #f0f0f0; padding-top: 25px; margin-bottom: 35px;">
        <div style="color: #700101; font-weight: 700; font-size: 16px; margin-bottom: 15px;">Order Summary</div>
        <div style="display: flex; flex-direction: column; gap: 12px; font-size: 14px; color: #b1b1b1; font-style: italic;">
            <div style="display: flex; justify-content: space-between;"><span>Subtotal</span> <span>₱{{ number_format($subtotal, 2) }}</span></div>
            <div style="display: flex; justify-content: space-between;"><span>Shipping</span> <span>₱{{ number_format($shipping, 2) }}</span></div>
            <div style="display: flex; justify-content: space-between;"><span>Tax (12%)</span> <span>₱{{ number_format($tax, 2) }}</span></div>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; padding-top: 10px;">
        <span style="font-size: 22px; font-weight: 700; color: #700101;">Total</span>
        <span style="font-size: 22px; font-weight: 700; color: #700101;">₱{{ number_format($total, 2) }}</span>
    </div>
    <form method="POST" action="{{ route('order') }}">
        @csrf
        <button type="submit" style="
            width: 100%;
            background-color: #700101;
            color: white;
            padding: 18px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-transform: none;
        ">
            Order Now
        </button>
    </form>
</div>
