@php $products = \App\Models\Product::take(6)->get(); @endphp

<div class="d-flex overflow-x-auto flex-nowrap">
    @foreach($products as $product)
    <div class="container-fluid px-2">
        <x-featured-product-card :product="$product" />
    </div>
    @endforeach
</div>
