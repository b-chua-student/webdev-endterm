@extends('layouts.user')

@section('title', 'Verify Email')

@section('content')
<div style="
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    justify-content: center; 
    padding: 80px 20px 120px 20px; 
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
">
    
    <div style="margin-bottom: 30px;">
        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#700101" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
    </div>

    <h1 style="
        font-size: 36px; 
        color: #700101; 
        font-weight: 700; 
        margin-bottom: 30px;
    ">
        Verify your email
    </h1>

    <p style="
        font-size: 14px; 
        line-height: 1.6; 
        color: #700101; 
        max-width: 600px; 
        margin-bottom: 40px;
    ">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>

    <button style="
        background-color: #700101; 
        color: white; 
        padding: 14px 60px; 
        border: none; 
        border-radius: 8px; 
        font-size: 16px; 
        font-weight: 600; 
        cursor: pointer;
        margin-bottom: 15px;
        box-shadow: 0 4px 6px rgba(112, 1, 1, 0.2);
    ">
        Track your order
    </button>

    <p style="font-size: 13px; color: #700101; margin-bottom: 60px;">
        Did not receive? <a href="#" style="color: #700101; font-weight: 700; text-decoration: underline;">Resend email</a>
    </p>

    <p style="font-size: 14px; color: #700101;">
        Already have an account? <a href="/login" style="color: #700101; font-weight: 700; text-decoration: underline;">Log in</a>
    </p>

</div>
@endsection