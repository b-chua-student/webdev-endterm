<div class="bg-brand">
<form class="p-4">
    <div class="mb-4">
        <div class="input-group bg-white rounded">
            <input type="text" class="form-control border-0" placeholder="What are you looking for?">
            <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
        </div>
    </div>

    <div class="mb-4 d-flex flex-wrap gap-2">
        <x-tag tagName="Arwen" />
        <x-tag tagName="Leigh" />
        <x-tag tagName="Beatrice" />
    </div>

    <div class="d-flex gap-2 mb-4">
        <input type="text" class="form-control form-control-sm" placeholder="₱ Minimum">
        <input type="text" class="form-control form-control-sm" placeholder="₱ Maximum">
    </div>

    <button type="submit" class="rounded-pill bg-brand border border-white w-100 py-2 button-brand-white"> Search </button>
</form>
</div>
