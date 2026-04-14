@extends('layouts.user')

@section('title', 'Home')

@section('content')
    <div class="container-fluid px-0 mb-5">
        <x-hero-banner />
    </div>

    <div class="container-fluid px-5 mb-5">
        <x-featured />
    </div>

    <div class="container-fluid px-0 mb-5">
        <x-category />
    </div>

    <div class="container-fluid px-0 mb-5">
        <x-about-us />
    </div>
@endsection