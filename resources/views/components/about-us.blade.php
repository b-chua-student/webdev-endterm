<div class="about-us w-100 position-relative overflow-hidden">
    <img src="{{ asset('img/about-us-banner.jpg') }}" alt="" class="w-100 about-img">
    <div class="position-absolute top-0 end-0 w-50 h-100 d-flex flex-column justify-content-center align-items-center z-1 px-5 about-content">
        <p class="fs-1 text-white fw-bold about-title">About Us</p>
        <p class="text-white about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</div>

<style>
    .about-img {
        transition: transform 0.6s ease;
    }
    .about-us:hover .about-img {
        transform: scale(1.04);
    }
    .about-title {
        opacity: 0;
        transform: translateY(-20px);
        animation: fade-down 0.8s ease forwards 0.2s;
    }
    .about-text {
        opacity: 0;
        transform: translateY(20px);
        animation: fade-up 0.8s ease forwards 0.4s;
    }
    @keyframes fade-down {
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-up {
        to { opacity: 1; transform: translateY(0); }
    }
</style>
