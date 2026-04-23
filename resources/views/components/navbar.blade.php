<nav class="navbar navbar-expand-lg w-100" style="background-color: #7d0a0a; height: 80px;">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/bethebeau-horizontal.png') }}" alt="" class="h-100 py-2 brand-logo">
        </a>
        <div class="d-flex">
            <a href="{{ route('home') }}" class="text-white text-decoration-none px-3 nav-link-hover">Home</a>
            <a href="{{ route('product-listing') }}" class="text-white text-decoration-none px-3 nav-link-hover">Products</a>
            <a href="{{ route('about-us') }}" class="text-white text-decoration-none px-3 nav-link-hover">About Us</a>
            <a href="{{ route('faq') }}" class="text-white text-decoration-none px-3 nav-link-hover">FAQ</a>
        </div>
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('shopping-cart') }}" class="cart-icon-hover">
                <img src="{{ asset('img/cart-white.svg') }}" style="width: 28px; height: 28px; transition: transform 0.2s ease;">
            </a>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn text-white p-0 nav-link-hover" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .nav-link-hover {
        position: relative;
        transition: opacity 0.2s ease;
    }
    .nav-link-hover::after {
        content: '';
        position: absolute;
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: white;
        transition: width 0.25s ease;
    }
    .nav-link-hover:hover::after { width: 60%; }
    .nav-link-hover:hover { opacity: 0.85; }

    .cart-icon-hover:hover img { transform: scale(1.15); }
</style>
