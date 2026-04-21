@php
    $excluded = $arrayExclude;
    $items = $col;
@endphp
<table>
    <thead>
        <tr>
            @foreach(array_keys($items->first()->getAttributes()) as $column)
                @if(!in_array($column, $excluded))
                    <th>{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                @endif
            @endforeach
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($col as $item)
            <tr>
            @foreach($item->getAttributes() as $column => $value)
                @if(!in_array($column, $arrayExclude))
                    <td>
                        @if($column === 'is_active')
                            {{ $value ? 'True' : 'False' }}
                        @else
                            {{ $value }}
                        @endif
                    </td>
                @endif
            @endforeach
                <td>
                        <a href="{{ route($editRoute, $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route($deleteRoute, $item->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
