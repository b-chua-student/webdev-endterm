@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="container-fluid px-0 mb-5">
        <x-hero-banner />
    </div>

    <div class="px-2 py-5">
        <x-featured :product-ids="[1, 2, 3, 4, 5, 6, 7]" />
    </div>

    <div class="container-fluid px-0 mb-5">
        <x-category />
    </div>

    <div class="container-fluid px-0 mb-5">
        <x-about-us />
    </div>
@endsection
