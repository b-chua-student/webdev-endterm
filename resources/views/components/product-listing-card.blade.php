<div class="product-listing-card" style="transition: transform 0.2s ease, box-shadow 0.2s ease; cursor: pointer;"
     onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 8px 20px rgba(0,0,0,0.15)'"
     onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'">
    <div class="product-listing-card-img-container border-brand">
        <img src="{{ asset('img/arwen.png') }}" alt="{{ $productName }}" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <div class="p-4 text-brand">
        <p class="fs-6 m-0">{{ $productCategory }}</p>
        <p class="fs-5 m-0">{{ $productName }}</p>
        <p class="fw-bold fs-5 m-0">{{ $productPrice }}</p>
    </div>
</div>
