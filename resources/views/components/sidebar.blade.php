<div class="bg-brand">
<form method="POST" action="{{ route('search-product') }}" class="p-4">
    @csrf
    <div class="mb-4">
        <div class="input-group bg-white rounded">
            <input type="text" name="search" class="form-control border-0" placeholder="What are you looking for?">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
        </div>
    </div>

    <div class="mb-4 d-flex flex-wrap gap-2">
        <x-tag tagName="Arwen" />
        <x-tag tagName="Leigh" />
        <x-tag tagName="Beatrice" />
    </div>

    <div class="d-flex gap-2 mb-4">
        <input type="number" name="min_price" class="form-control form-control-sm" placeholder="₱ Minimum">
        <input type="number" name="max_price" class="form-control form-control-sm" placeholder="₱ Maximum">
    </div>

    <button type="submit" class="rounded-pill bg-brand border border-white w-100 py-2 button-brand-white"> Search </button>
</form>
</div>
