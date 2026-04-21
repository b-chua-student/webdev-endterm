@extends('layouts.user')
@section('title', 'Product View')
@section('content')
<div class="container-fluid py-5 px-4">
    <div class="row gx-5">

        <div class="col-lg-7">
            <div class="d-flex gap-3" style="height: 600px;">

                <div class="bg-white border border-dark d-flex align-items-center justify-content-center shadow-sm" style="width: 75%;">
                    <span class="text-muted">Main Product Image</span>
                </div>

                <div class="d-flex flex-column gap-2" style="width: 20%;">
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="bg-white border border-dark d-flex align-items-center justify-content-center flex-fill shadow-sm">
                        <span class="text-muted small">Thumb {{ $i }}</span>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="col-lg-5 d-flex flex-column pt-5" style="max-width: 771px;">

            <a href="{{ route('product-listing') }}" class="text-decoration-none d-flex align-items-center gap-1 mb-5" style="color: #800000; font-size: 0.9rem;">
                <span style="font-size: 1.2rem; line-height: 0;">&larr;</span> Back to Products
            </a>

            <p class="mb-2" style="color: #7d0a0a91; font-size: 0.95rem;">{{ $product->category->name }}</p>

            <h1 class="mb-5" style="color: #7d0a0a; font-weight: 300; font-size: 3rem;">{{ $product->name }}</h1>

            <div class="py-3 px-4 mb-5" style="background-color: #f7f7f7; width: fit-content; min-width: 100%;">
                <h2 class="m-0" style="color: #7d0a0a; font-weight: 600;">₱{{ $product->price }}</h2>
            </div>

            <div class="d-flex gap-3 mb-4">
                <span class="text-white px-3 py-2 text-center" style="background-color: #7d0a0a; font-size: 0.8rem; min-width: 100px;">20% OFF</span>
                <span class="text-white px-3 py-2 text-center" style="background-color: #7d0a0a; font-size: 0.8rem; min-width: 130px;">FREE SHIPPING</span>
            </div>

            <p class="mb-5" style="color: #7d0a0a; font-size: 0.85rem;">Stock Available: {{ $product->stock }} pcs</p>

            <p class="mb-5" style="color: #7d0a0a; font-size: 0.85rem;">{{ $product->description }}</p>

            <div class="d-flex gap-3 mt-auto">
                <form action="/cart/add" method="POST" class="btn py-3 rounded-1 fw-semibold" style="border: 1.5px solid #7d0a0a; color: #7d0a0a; background-color: white; font-size: 0.9rem; flex: 1;">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" value="1">
                    <button type="submit">Add to Cart</button>
                </form>
                <button class="btn py-3 rounded-1 text-white fw-semibold" style="background-color: #7d0a0a; border: 1.5px solid #7d0a0a; font-size: 0.9rem; flex: 1;">
                    Order Now
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
