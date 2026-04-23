@extends('layouts.auth')
@section('title', 'Create Order')
@section('content')
<div class="d-flex min-vh-100">
    <div class="d-flex flex-column bg-brand text-white" style="width: 260px; flex-shrink: 0;">
        <x-admin-navbar />
    </div>
    <div class="flex-grow-1 p-5 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="display-6 text-brand fw-bold m-0">Create Order</p>
            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">← Back</a>
        </div>
        <div class="bg-white rounded shadow-sm p-4" style="max-width: 700px;">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Customer</label>
                    <select name="user_id" class="form-select" style="border-color: #7d0a0a;">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Ship To</label>
                    <input type="text" name="shipped_to" value="{{ old('shipped_to') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Status</label>
                    <select name="status" class="form-select" style="border-color: #7d0a0a;">
                        @foreach(['pending','confirmed','processing','shipped','delivered','cancelled','refunded','failed'] as $status)
                            <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr class="my-4">
                <p class="fw-semibold text-brand">Order Items</p>

                <div id="order-items">
                    <div class="row g-2 mb-2 order-item">
                        <div class="col-md-5">
                            <select name="items[0][product_id]" class="form-select" style="border-color: #7d0a0a;">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->price }}">
                                        {{ $product->name }} (₱{{ number_format($product->price, 2) }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="items[0][quantity]" value="1" min="1"
                                   placeholder="Quantity" class="form-control" style="border-color: #7d0a0a;">
                        </div>
                        <div class="col-md-3">
                            <input type="number" step="0.01" name="items[0][unit_price]"
                                   placeholder="Unit Price" class="form-control" style="border-color: #7d0a0a;">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-outline-danger w-100 remove-item">✕</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-item" class="btn btn-outline-secondary btn-sm mb-4">+ Add Item</button>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Total Price</label>
                    <input type="number" step="0.01" name="total_price" value="{{ old('total_price') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="m-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="submit" class="btn w-100 text-white fw-semibold"
                        style="background-color: #7d0a0a; border-radius: 6px; padding: 10px;">
                    Create Order
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    let index = 1;
    document.getElementById('add-item').addEventListener('click', () => {
        const container = document.getElementById('order-items');
        const first = container.querySelector('.order-item').cloneNode(true);
        first.querySelectorAll('input').forEach(i => i.value = '');
        first.querySelectorAll('select, input').forEach(el => {
            el.name = el.name.replace(/\[\d+\]/, `[${index}]`);
        });
        container.appendChild(first);
        index++;
    });

    document.getElementById('order-items').addEventListener('click', e => {
        if (e.target.classList.contains('remove-item')) {
            const items = document.querySelectorAll('.order-item');
            if (items.length > 1) e.target.closest('.order-item').remove();
        }
    });
</script>
@endsection
