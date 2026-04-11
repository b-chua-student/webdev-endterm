@extends('layouts.user')

@section('title', 'Shopping Cart')

@section('content')

<x-shopping-cart-items-table />
<x-shopping-cart-total />

@endsection
