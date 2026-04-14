@extends('layouts.user')

@section('content')
<div class="d-flex w-100 min-vh-100">
    
    <aside class="flex-shrink-0" style="width: 280px; background-color: #800000; border-top: 1px solid rgba(255,255,255,0.2);">
        <x-side-navbar />
    </aside>

    <main class="flex-grow-1 p-5 bg-white">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-3 g-5">
                @for ($i = 0; $i < 6; $i++)
                    <div class="col">
                        <x-product-listing-card />
                    </div>
                @endfor
            </div>
        </div>
    </main>

</div>
@endsection