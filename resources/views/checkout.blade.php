@extends('layouts.withnavbar')

@section('title', 'Checkout')

@section('heading', 'Checkout')

@section('content')
  <h1>
    Checkout
  </h1>

    @if($user)
      <ul>
      <li>{{ $user->first_name }}{{ $user->last_name }}</li>
      <li>{{ $user->email_account }} </li>
      <li>{{ $user->instagram_account }} </li>
      <li>{{ $user->address }} </li>

      @forelse($cartItems as $item)
          <div class="product-card">
              <h3>{{ $item->product->name }}</h3>
              <p>{{ $item->product->description }}</p>
              <p><strong>Qty:</strong> {{ $item->quantity }}</p>
              <p><strong>Price:</strong> ${{ number_format($item->product->price, 2) }}</p>
              <p><strong>Subtotal:</strong> ${{ number_format($item->product->price * $item->quantity, 2) }}</p>
          </div>
      @empty
          <p>Your cart is empty.</p>
      @endforelse
      </ul>
    @else
      No User
    @endif
@endsection
