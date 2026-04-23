@extends('layouts.user')
@section('title', 'About Us')
@section('content')

<section class="mb-5">
    <img src="{{ asset('img/about-us-banner.jpg') }}" alt="About Us" class="w-100 about-img"
         style="max-height: 480px; object-fit: cover;">
</section>

<section class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <h2 class="fw-bold text-brand mb-3">Who We Are</h2>
            <p class="text-muted lh-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula sapien vel urna
                tincidunt, sit amet facilisis nulla tincidunt. Pellentesque habitant morbi tristique senectus
                et netus et malesuada fames ac turpis egestas. Nulla facilisi. Sed euismod, nisl vel
                ultricies lacinia, nisl nisl aliquam nisl.
            </p>
            <p class="text-muted lh-lg">
                Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;
                Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur
                aliquet quam id dui posuere blandit.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <div class="rounded p-5" style="background-color: #f9f0f0;">
                <h1 class="fw-bold" style="color: #7d0a0a; font-size: 4rem;">10+</h1>
                <p class="text-muted fw-semibold">Years of Excellence</p>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <h5 class="fw-bold text-brand">Our Mission</h5>
                <p class="text-muted small lh-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim, lorem at
                    tincidunt scelerisque, lacus arcu facilisis erat.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <h5 class="fw-bold text-brand">Our Vision</h5>
                <p class="text-muted small lh-lg">
                    Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur
                    non nulla sit amet nisl tempus convallis.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 text-center p-4">
                <h5 class="fw-bold text-brand">Our Values</h5>
                <p class="text-muted small lh-lg">
                    Nulla quis lorem ut libero malesuada feugiat. Pellentesque in ipsum id orci porta
                    dapibus. Quisque velit nisi pretium ut lacinia in.
                </p>
            </div>
        </div>
    </div>

    <div class="row bg-white rounded shadow-sm p-5 mb-5">
        <div class="col-12 text-center mb-4">
            <h2 class="fw-bold text-brand">Our Story</h2>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="col-md-6">
            <p class="text-muted lh-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget
                malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                sapien massa, convallis a pellentesque nec, egestas non nisi.
            </p>
        </div>
        <div class="col-md-6">
            <p class="text-muted lh-lg">
                Nulla porttitor accumsan tincidunt. Vivamus magna. Fusce eu felis eget sapien dignissim
                pharetra. Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius,
                turpis molestie pretium ultrices.
            </p>
        </div>
    </div>

    <div class="text-center py-4">
        <h4 class="fw-bold text-brand mb-2">Ready to experience the difference?</h4>
        <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <a href="{{ route('home') }}" class="btn text-white fw-semibold px-5 py-3"
           style="background-color: #7d0a0a; border-radius: 6px;">
            Shop Now
        </a>
    </div>
</section>

@endsection
