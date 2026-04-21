@extends('layouts.user')

@section('title', 'Shopping Cart')

@section('content')
<style>
    /* Reset basic styling if needed */
    body, h2, h4, p { margin: 0; padding: 0; box-sizing: border-box; font-family: sans-serif; }
</style>

<div style="display: flex; max-width: 1400px; margin: 40px auto 100px auto; gap: 40px; padding: 0 40px; align-items: flex-start;">

    <div style="flex: 2; min-width: 0;">
        <x-shopping-cart-items-table :items="$items" />
    </div>

    <div style="width: 1px; background-color: #d1d5db; align-self: stretch;"></div>

    <div style="flex: 1; padding-top: 20px;">
        <div style="margin-bottom: 24px;">
            <a href="#" style="color: #6b7280; text-decoration: none; font-size: 14px; display: inline-flex; align-items: center;">
                <span style="margin-right: 4px;">←</span> Back to Products
            </a>
        </div>
        <x-shopping-cart-total :items="$items" />
    </div>
</div>
@endsection
