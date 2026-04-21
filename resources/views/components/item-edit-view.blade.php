<form action="{{ route($updateRoute, $item->id) }}" method="POST" class="p-4">
    @csrf
    @method('PUT')
    @foreach($item->getAttributes() as $column => $value)
        @if(!in_array($column, $arrayExclude))
            <div class="mb-3">
                <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">
                    {{ ucfirst(str_replace('_', ' ', $column)) }}
                </label>
                @if($column === $optionName && count($options) > 0)
                    <select name="{{ $column }}" class="form-select" style="border-color: #7d0a0a;">
                        @foreach($options as $label => $val)
                            <option value="{{ $val }}" {{ $value == $val ? 'selected' : '' }}>
                                {{ ucfirst($label) }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <input type="text" name="{{ $column }}" value="{{ $value }}"
                           class="form-control" style="border-color: #7d0a0a;">
                @endif
            </div>
        @endif
    @endforeach
    <button type="submit" class="btn w-100 mt-2 text-white fw-semibold"
            style="background-color: #7d0a0a; border-radius: 6px; padding: 10px;">
        Update
    </button>
</form>
