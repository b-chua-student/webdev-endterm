@props(['item'])

<div class="d-flex justify-content-around align-items-center text-brand py-3 border-bottom">
    <div class="img-size-thumbnail" style="width:80px;">
        <img src="{{ asset('img/arwen.png') }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div style="flex:1; padding: 0 12px;">
        <p class="fs-6 fw-bold m-0">{{ $item->product->name }}</p>
        <p class="fs-6 m-0 text-muted">{{ $item->product->description }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center" style="width:100px;">
        <p class="m-0">₱{{ number_format($item->product->price, 2) }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center gap-3" style="width:120px;">
        <p class="m-0">{{ $item->quantity }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center" style="width:100px;">
        <p class="m-0">₱{{ number_format($item->product->price * $item->quantity, 2) }}</p>
    </div>
    <div class="d-flex align-items-center justify-content-center" style="width:40px;">
        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: none; border: none; cursor: pointer; color: #700101;" title="Remove">
                ✕
            </button>
        </form>
    </div>
</div>
