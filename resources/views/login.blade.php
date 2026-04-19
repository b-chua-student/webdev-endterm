@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <div class="d-flex flex-row min-vh-100">
        <div class="w-50 bg-brand min-vh-100 d-flex justify-content-center align-items-center">
            <img src="{{ asset('img/bethebeau.png') }}" alt="">
        </div>
        <div class="w-50 min-vh-100 d-flex justify-content-center align-items-center">
            <div class="w-50 d-flex flex-column gap-5">
                <p class="fs-1 text-brand w-100 text-center">Login</p>

                <form method='POST' action='{{ route('login') }}' class="d-flex flex-column gap-4">
                    @csrf
                    <div class="d-flex flex-column gap-2">
                        <div>
                            <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Email</label>
                            <input id='email' name='email' type="text" placeholder="email@email.com" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                        </div>
                        <div>
                        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Password</label>
                        <input id='password' name='password' type="password" placeholder="*******" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
                        </div>
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
                    <p class="w-100 text-center text-muted">Don't have an account yet?
                        <a href="{{ route('register') }}" class="text-brand">Sign Up</a>
                    </p>

                    <form method='POST' action='{{ route('login-guest') }}'>
                        @csrf
                        <p class="w-100 text-center text-muted">Or
                            <button type="submit" class="text-brand border-0 bg-white">Login as Guest</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

