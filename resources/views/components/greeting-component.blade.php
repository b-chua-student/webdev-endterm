<div>
    @if (Auth::user()->role === 'guest')
        <h1> Hello, Guest </h1>
    @else
        <h1> Hello, {{Auth::user()->first_name}} {{Auth::user()->last_name}} </h1>
    @endif
</div>
