@extends('layouts.user')

@section('title', 'Order Confirmation')

@section('content')

<x-order-confirmation />
<x-order-summary-item />
<x-order-summary-item />
<x-order-summary-item />
<x-order-summary-card />

@endsection
