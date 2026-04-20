@isset($users)
<form method="POST" action="{{ route('test-search-users') }}">
    @csrf
    <input type="text" name="search" placeholder="Search users">
    <button type="Submit">Submit</button>
</form>

<ul>
    @foreach($users as $user)
    <li>{{ $user->first_name }} {{ $user->last_name }}</li>
    @endforeach
</ul>
@endisset

@isset($products)
<form method="POST" action="{{ route('test-search-products') }}">
    @csrf
    <input type="text" name="search" placeholder="Search products">
    <button type="Submit">Submit</button>
</form>

<ul>
    @foreach($products as $product)
    <li>{{ $product->name }}</li>
    <li>{{ $product->description }}</li>
    <li>{{ $product->price }}</li>
    <li>{{ $product->stock }}</li>
    <li>{{ $product->slug }}</li>
    -----------
    @endforeach
</ul>
@endisset

@isset($orders)
<form method="POST" action="{{ route('test-search-orders') }}">
    @csrf
    <input type="text" name="search" placeholder="Search orders">
    <button type="Submit">Submit</button>
</form>

<ul>
    @foreach($orders as $order)
        <li>{{ $order->email }}</li>
        <li>{{ $order->shipped_to }}</li>
        <li>{{ $order->status }}</li>
        <li>{{ $order->total_price }}</li>
        <li>{{ $order->ordered_at }}</li>
        -----------
    @endforeach
</ul>
@endisset
