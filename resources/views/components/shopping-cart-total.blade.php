<div style="display: flex; flex-direction: column; width: 100%;">
    <h2 style="font-size: 36px; font-weight: 200; color: #4b5563; margin-bottom: 40px; font-family: sans-serif;">
        Cart Total
    </h2>

    <div style="font-style: italic; color: #6b7280; line-height: 1.8; margin-bottom: 60px;">
        <div style="display: flex; justify-content: space-between;">
            <span>Shipping</span>
            <span>₱99.99</span>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <span>Tax</span>
            <span>₱99.99</span>
        </div>
        <div style="display: flex; justify-content: space-between;">
            <span>Subtotal</span>
            <span>₱99.99</span>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: flex-end; padding-bottom: 30px; border-top: 1px solid #e5e7eb; margin-top: auto; padding-top: 30px;">
        <span style="font-size: 24px; font-weight: bold; color: #1f2937;">Total</span>
        <span style="font-size: 32px; font-weight: bold; color: #700101;">₱99.99</span>
    </div>

    <form method='POST' action='{{ route('checkout') }}'>
        @csrf
        <button style="
            width: 100%;
            background-color: #700101;
            color: white;
            padding: 16px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            box-shadow: 0 4px 6px -1px rgba(112, 1, 1, 0.3);
        " onmouseover="this.style.backgroundColor='#5a0101'" onmouseout="this.style.backgroundColor='#700101'">
            Proceed to Checkout
        </button>
    </form>
</div>
