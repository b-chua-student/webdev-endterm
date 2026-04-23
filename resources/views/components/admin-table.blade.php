@php
    $excluded = $arrayExclude;
    $items = $col;
@endphp

<div class="table-responsive">
    <table class="table table-hover align-middle mb-0" style="font-size: 0.9rem;">
        <thead>
            <tr style="background-color: #7d0a0a;">
                @foreach(array_keys($items->first()->getAttributes()) as $column)
                    @if(!in_array($column, $excluded))
                        <th class="text-white text-uppercase fw-semibold py-3 px-4"
                            style="font-size: 0.72rem; letter-spacing: 0.08em; white-space: nowrap;">
                            {{ str_replace('_', ' ', $column) }}
                        </th>
                    @endif
                @endforeach
                <th class="text-white text-uppercase fw-semibold py-3 px-4"
                    style="font-size: 0.72rem; letter-spacing: 0.08em;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($col as $item)
                <tr style="border-bottom: 1px solid #f0e0e0;">
                    @foreach($item->getAttributes() as $column => $value)
                        @if(!in_array($column, $arrayExclude))
                            <td class="px-4 py-3 text-secondary">
                                @if($column === 'is_active')
                                    <span class="badge {{ $value ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $value ? 'Active' : 'Inactive' }}
                                    </span>
                                @elseif($column === 'status')
                                    @php
                                        $statusColor = match($value) {
                                            'pending'    => 'warning',
                                            'confirmed'  => 'info',
                                            'processing' => 'primary',
                                            'shipped'    => 'secondary',
                                            'delivered'  => 'success',
                                            'cancelled'  => 'danger',
                                            'refunded'   => 'dark',
                                            'failed'     => 'danger',
                                            default      => 'secondary',
                                        };
                                    @endphp
                                    <span class="badge bg-{{ $statusColor }}">{{ ucfirst($value) }}</span>
                                @else
                                    {{ Str::limit($value, 40) }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                    <td class="px-4 py-3">
                        <div class="d-flex gap-2">
                            <a href="{{ route($editRoute, $item->id) }}"
                               class="btn btn-sm fw-semibold text-white"
                               style="background-color: #c8a200; border-radius: 5px; font-size: 0.8rem;">
                                Edit
                            </a>
                            <form action="{{ route($deleteRoute, $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm fw-semibold text-white"
                                        style="background-color: #a00000; border-radius: 5px; font-size: 0.8rem;"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
