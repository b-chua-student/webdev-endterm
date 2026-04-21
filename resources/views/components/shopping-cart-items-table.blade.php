@props(['items'])
<div>
    <div class="d-flex justify-content-around text-brand fw-semibold border-bottom pb-2 mb-2">
        <p class="m-0" style="width:24px;"></p>
        <p class="m-0" style="width:80px;"></p>
        <p class="m-0" style="flex:1; padding: 0 12px;">Product</p>
        <p class="m-0" style="width:100px; text-align:center;">Unit Price</p>
        <p class="m-0" style="width:120px; text-align:center;">Quantity</p>
        <p class="m-0" style="width:100px; text-align:center;">Total Price</p>
        <p class="m-0" style="width:40px;"></p>
    </div>
    @forelse($items as $item)
        <div style="transition: background-color 0.2s ease;"
             onmouseover="this.style.backgroundColor='#fdf2f2'"
             onmouseout="this.style.backgroundColor='transparent'">
            <x-shopping-cart-item :item="$item" />
        </div>
    @empty
        <p class="text-muted ps-5 mt-3">Your cart is empty.</p>
    @endforelse
</div>
