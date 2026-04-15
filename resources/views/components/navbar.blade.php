<nav class="navbar navbar-expand-lg w-100" style="background-color: #7d0a0a; height: 80px;">
  <div class="container-fluid justify-content-between">

    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/bethebeau-horizontal.png') }}" alt="" class="h-100 py-2 brand-logo">
    </a>

    <div class="d-flex">
<<<<<<< feat/add-product-listing
      <a href="" class="text-white text-decoration-none px-3">Home</a>
      <a href="{{ route('product-listing') }}" class="text-white text-decoration-none px-3">Products</a>
=======
      <a href="{{ route('home') }}" class="text-white text-decoration-none px-3">Home</a>
      <a href="" class="text-white text-decoration-none px-3">Products</a>
>>>>>>> master
      <a href="" class="text-white text-decoration-none px-3">About Us</a>
      <a href="" class="text-white text-decoration-none px-3">FAQ</a>
    </div>

    <div class="d-flex align-items-center gap-3">
      <img src="{{ asset('img/user-white.svg') }}" style="width: 28px; height: 28px;">
      <img src="{{ asset('img/cart-white.svg') }}" style="width: 28px; height: 28px;">
    </div>

  </div>
</nav>
