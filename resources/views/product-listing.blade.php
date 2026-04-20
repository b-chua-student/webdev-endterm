@extends('layouts.user')

@section('content')
<div class="d-flex w-100 min-vh-100">

    <aside class="flex-shrink-0" style="width: 280px; background-color: #800000; border-top: 1px solid rgba(255,255,255,0.2);">
        <x-sidebar />
    </aside>

    <main class="flex-grow-1 p-5 bg-white">
        <div class="container-fluid">
            <div class="row g-5">
                @foreach ($products as $product)
                    <div class="col-auto">
                        <a href="{{ route('product-view') }}">
                            <x-product-listing-card />
                            <x-product-listing-card
                                productCategory="{{ $product->category->name }}"
                                productName="{{ $product->name }}"
                                productPrice="{{ $product->price }}"
                            />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

</div>
@endsection
