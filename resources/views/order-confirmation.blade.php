@extends('layouts.user')

@section('title', 'Order Confirmation')

@section('content')
<div style="display: flex; flex-direction: column; align-items: center; padding: 60px 20px 100px; font-family: sans-serif; max-width: 1000px; margin: 0 auto; text-align: center;">
    
    <h1 style="font-size: 48px; font-weight: 200; color: #700101; margin-bottom: 10px;">Thank You!</h1>
    <p style="font-size: 18px; color: #700101; margin-bottom: 30px;">
        Your order <span style="color: #700101; font-weight: bold;">#12345678</span> has been placed!
    </p>

    <p style="font-size: 13px; color: #700101; max-width: 650px; line-height: 1.6; margin-bottom: 40px; font-style: italic;">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </p>

    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; border: 1px solid #700101; border-radius: 4px; width: 100%; margin-bottom: 50px;">
        <div style="padding: 25px; border-right: 1px solid #700101; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px; display: flex; align-items: center;">
                <span style="margin-right: 8px;">👤</span> Customer
            </div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                Lorem Ipsum<br>Lorem Ipsum<br>Lorem Ipsum
            </div>
        </div>
        <div style="padding: 25px; border-right: 1px solid #700101; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px; display: flex; align-items: center;">
                <span style="margin-right: 8px;">💳</span> Billing Details
            </div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                Lorem Ipsum<br>Lorem Ipsum<br>Lorem Ipsum
            </div>
        </div>
        <div style="padding: 25px; text-align: left;">
            <div style="color: #700101; font-weight: bold; font-size: 14px; margin-bottom: 15px; display: flex; align-items: center;">
                <span style="margin-right: 8px;">🚚</span> Shipping Method
            </div>
            <div style="font-size: 12px; color: #700101; line-height: 1.8;">
                Lorem Ipsum<br>Lorem Ipsum<br>Lorem Ipsum
            </div>
        </div>
    </div>

    <button style="background-color: #700101; color: white; padding: 15px 80px; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; margin-bottom: 60px;">
        Track your order
    </button>

    <div style="width: 100%; text-align: center;">
        <h3 style="font-size: 14px; color: #700101; margin-bottom: 40px; text-transform: none;">Order Summary</h3>
        
        <div style="max-width: 500px; margin: 0 auto 50px auto;">
            @foreach(range(1,3) as $i)
            <div style="display: flex; gap: 20px; margin-bottom: 30px; align-items: center; text-align: left;">
                <img src="https://via.placeholder.com/70" style="width: 70px; height: 70px; object-fit: cover; border-radius: 4px;">
                <div style="flex-grow: 1;">
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #700101; font-weight: bold; font-size: 14px;">Product Name</span>
                        <span style="color: #700101; font-size: 13px;">Unit Price</span>
                    </div>
                    <div style="color: #700101; font-size: 12px;">Product Category</div>
                    <div style="color: #700101; font-size: 11px; margin-top: 10px;">Product ID | Quantity</div>
                </div>
            </div>
            @endforeach
        </div>

        <div style="max-width: 500px; margin: 0 auto; border: 1px solid #700101; border-radius: 4px; padding: 30px; text-align: left;">
            <h4 style="color: #700101; font-size: 16px; font-weight: bold; text-align: center; margin-bottom: 20px;">Order Summary</h4>
            <div style="display: flex; flex-direction: column; gap: 10px; color: #700101; font-size: 14px; font-style: italic; margin-bottom: 25px;">
                <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
                <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
                <div style="display: flex; justify-content: space-between;"><span>Lorem Ipsum</span> <span>Unit Price</span></div>
            </div>
            <div style="display: flex; justify-content: space-between; border-top: 1px solid #f0f0f0; padding-top: 15px;">
                <span style="color: #700101; font-weight: bold; font-size: 18px;">Total</span>
                <span style="color: #700101; font-weight: bold; font-size: 18px;">Unit Price</span>
            </div>
        </div>
    </div>
</div>
@endsection