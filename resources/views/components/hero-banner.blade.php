<div class="w-100 overflow-hidden position-relative">
    <div class="d-flex scroll-track">
        @foreach(range(1, 6) as $i)
            <img src="{{ asset('img/hero-banner.png') }}" class="object-fit-cover flex-shrink-0" style="width: 33.333%;">
        @endforeach
    </div>
</div>

<style>
    .scroll-track {
        width: 200%;
        animation: scroll-left 18s linear infinite;
    }
    @keyframes scroll-left {
        0%   { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }
    .scroll-track:hover {
        animation-play-state: paused;
    }
</style>
