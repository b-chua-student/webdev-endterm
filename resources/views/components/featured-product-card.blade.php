@props(['product'])
<div class="featured-product-card border-brand d-flex flex-column" style="width: 220px; height: 400px;">
    <div style="flex: 1; overflow: hidden; min-height: 0;">
        <img src="{{ asset('img/arwen.png') }}" alt="{{ $product->name }}"
             style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <div class="p-3" style="flex-shrink: 0;">
        <p class="fw-bold text-brand mb-1">{{ $product->name }}</p>
        <p class="text-muted mb-1" style="font-size: 0.85rem;">{{ $product->category->name }}</p>
        <p class="text-brand fw-semibold mb-3">₱{{ number_format($product->price, 2) }}</p>
        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn w-100 py-2 rounded-1 fw-semibold"
                style="border: 1.5px solid #7d0a0a; color: #7d0a0a; background-color: white; font-size: 0.9rem; transition: background-color 0.2s ease, color 0.2s ease, transform 0.15s ease;"
                onmouseover="this.style.backgroundColor='#7d0a0a'; this.style.color='white'; this.style.transform='scale(1.03)'"
                onmouseout="this.style.backgroundColor='white'; this.style.color='#7d0a0a'; this.style.transform='scale(1)'"
                onmousedown="this.style.transform='scale(0.97)'"
                onmouseup="this.style.transform='scale(1.03)'">
                Add to Cart
            </button>
        </form>
    </div>
</div>
