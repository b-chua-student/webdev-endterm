<div style="width: 100%;">
    <h2 style="font-size: 42px; font-weight: 200; color: #700101; margin-bottom: 45px; letter-spacing: 1px;">Cart Total</h2>

    <div style="margin-bottom: 40px;">
        @foreach(range(1,3) as $i)
        <div style="display: flex; gap: 20px; margin-bottom: 25px; align-items: flex-start;">
            <img src="https://via.placeholder.com/80" style="width: 80px; height: 80px; object-fit: cover; border-radius: 4px;">
            <div style="flex-grow: 1; padding-top: 5px;">
                <div style="display: flex; justify-content: space-between; align-items: baseline;">
                    <span style="color: #700101; font-weight: 700; font-size: 15px;">Product Name</span>
                    <span style="color: #700101; font-size: 12px;">Unit Price</span>
                </div>
                <div style="color: #700101; font-size: 13px; margin-top: 2px;">Product Category</div>
                <div style="color: #700101; font-size: 12px; margin-top: 15px;">Product ID | Quantity</div>
            </div>
        </div>
        @endforeach
    </div>

    <div style="border-top: 1px solid #f0f0f0; padding-top: 25px; margin-bottom: 35px;">
        <div style="color: #700101; font-weight: 700; font-size: 16px; margin-bottom: 15px;">Order Summary</div>
        <div style="display: flex; flex-direction: column; gap: 12px; font-size: 14px; color: #b1b1b1; font-style: italic;">
            <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
            <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
            <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
        </div>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; padding-top: 10px;">
        <span style="font-size: 22px; font-weight: 700; color: #700101;">Total</span>
        <span style="font-size: 22px; font-weight: 700; color: #700101;">Unit Price</span>
    </div>

    <form method='POST' action='{{ route('order-confirmation') }}'
        @csrf
        <button style="
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
