@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 8px; max-width: 16rem;">
    @csrf
    <label for="first-name">First Name</label>
    <input type="text" name="first_name" id="first-name">

    <label for="last-name">Last Name</label>
    <input type="text" name="last_name" id="last-name">

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <label for="password-confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password-confirmation">

    <button type="submit">Submit</button>
</form>

<a href="{{ route('login') }}">Already have an account? Log In</a>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection
