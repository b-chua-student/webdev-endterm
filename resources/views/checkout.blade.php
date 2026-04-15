@extends('layouts.user')

@section('title', 'Checkout')

@section('content')
<div style="display: flex; max-width: 1400px; margin: 40px auto 100px auto; gap: 60px; padding: 0 40px; align-items: flex-start; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
    
    <div style="flex: 1.5; min-width: 0;">
        <h1 style="font-size: 36px; font-weight: 200; color: #700101; margin-bottom: 35px; letter-spacing: 1px;">Checkout</h1>
        <x-checkout-details />
    </div>

    <div style="width: 1px; background-color: #700101; align-self: stretch; opacity: 0.3;"></div>

    <div style="flex: 1; padding-top: 10px;">
        <div style="margin-bottom: 30px;">
            <a href="#" style="color: #700101; text-decoration: none; font-size: 13px; font-weight: 500;">
                <span style="margin-right: 5px;">←</span> Back to Products
            </a>
        </div>
        <x-checkout-total />
    </div>
</div>
@endsection