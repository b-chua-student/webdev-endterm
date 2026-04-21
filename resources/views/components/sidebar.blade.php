<div class="bg-brand sidebar-form">
    <form method="POST" action="{{ route('search-product') }}" class="p-4">
        @csrf
        <div class="mb-4">
            <div class="input-group bg-white rounded search-input-group">
                <input type="text" name="search" class="form-control border-0" placeholder="What are you looking for?">
                <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
            </div>
        </div>
        <div class="d-flex gap-2 mb-4">
            <input type="number" name="min_price" class="form-control form-control-sm price-input" placeholder="₱ Minimum">
            <input type="number" name="max_price" class="form-control form-control-sm price-input" placeholder="₱ Maximum">
        </div>
        <button type="submit" class="text-white rounded-pill bg-brand border border-white w-100 py-2 button-brand-white search-btn">Search</button>
    </form>
</div>

<style>
    .search-input-group {
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .search-input-group:focus-within {
        box-shadow: 0 0 0 3px rgba(255,255,255,0.4);
        transform: scale(1.01);
    }
    .price-input {
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }
    .price-input:focus {
        box-shadow: 0 0 0 3px rgba(255,255,255,0.4);
        transform: scale(1.02);
        outline: none;
    }
    .search-btn {
        transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
    }
    .search-btn:hover {
        background-color: white !important;
        color: #7d0a0a !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .search-btn:active {
        transform: translateY(0);
    }
</style>
