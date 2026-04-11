@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<form method="POST" action="{{ route('login-user') }}">
    @csrf
    <label for="email">Email</label>
    <input type="email" id="email" name="email">
    <label for="password">Password</label>
    <input type="password" id="password" name="password">
    <button type="submit">Login</button>
</form>

<form method="POST" action="{{ route('login-guest') }}">
    @csrf
    <button type="submit">Login As Guest</button>
</form>

<a href="{{ route('register') }}">No Account? Sign Up</a>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection
