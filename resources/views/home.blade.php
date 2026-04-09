@extends('layouts.base')

@section('title', 'Home')

@section('content')

<h1> Homepage </h1>
<x-greeting-component />

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>

@endsection
