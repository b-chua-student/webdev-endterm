<div class="d-flex w-100">
    <x-category-card img="{{ asset('img/category1.png') }}" category="Beatrice"/>
    <x-category-card img="{{ asset('img/category2.png') }}" category="Arwen"/>
    <x-category-card img="{{ asset('img/category3.png') }}" category="Leigh"/>
    <x-category-card img="{{ asset('img/category4.png') }}" category="Bloom Bar"/>
</div>

<style>
    .category-card {
        transition: transform 0.3s ease, filter 0.3s ease;
        overflow: hidden;
        cursor: pointer;
    }
    .category-card:hover {
        transform: scale(1.03);
        filter: brightness(1.1);
        z-index: 1;
    }
    .category-card img {
        transition: transform 0.4s ease;
    }
    .category-card:hover img {
        transform: scale(1.08);
    }
    .category-card a {
        transition: letter-spacing 0.3s ease;
    }
    .category-card:hover a {
        letter-spacing: 3px;
    }
</style>
