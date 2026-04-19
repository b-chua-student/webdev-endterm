@extends('layouts.auth')

@section('title', 'Sign Up')

@section('content')
    <div class="d-flex flex-row min-vh-100">
        <div class="w-50 bg-brand min-vh-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/bethebeau.png') }}" alt="">
        </div>
        <div class="w-50 min-vh-100 d-flex justify-content-center align-items-center">
            <div class="w-50 d-flex flex-column gap-5">
                <p class="fs-1 text-brand w-100 text-center">Sign Up</p>

                <form method='POST' action='{{ route('register') }}' class="d-flex flex-column gap-4">
                    @csrf
                    <div class="d-flex flex-row gap-4 w-100">
                        <div class='d-flex flex-column w-100'>
                            <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">First Name</label>
                            <input name="first_name" id="first-name" type="text" placeholder="Joe" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                        </div>
                        <div class='d-flex flex-column w-100'>
                            <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Last Name</label>
                            <input name="last_name" id="last-name" type="text" placeholder="Smith" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                        </div>
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Email</label>
                        <input name="email" id="email" type="text" placeholder="email@email.com" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                    </div>
                    <div>
                        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Password</label>
                        <input name="password" id="password" type="password" placeholder="********" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                    </div>
                    <div>
                    <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Confirm Password</label>
                    <input name="password_confirmation" id="password-confirmation" type="password" placeholder="********" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-brand">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button type="submit" class="rounded-pill text-center text-white bg-brand py-3 fw-bold border-0 w-100">Submit</button>
                </form>

                <div>
                    <p class="w-100 text-center text-muted">Already have an account yet?
                        <a href="{{ route('login') }}" class="text-brand">Log In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


