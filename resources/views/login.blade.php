@extends('layouts.withnavbar')

@section('title', 'Login')

@section('heading', 'Login')

@section('content')
  <form action="/login" method="POST">
      @csrf

      <label for="email">Email:</label>
      <input type="email" name="email_account"><br>

      <label for="password">Password:</label>
      <input type="password" name="password"><br>

      <button type="submit">Submit</button>
  </form>

  @if ($errors->any())
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  @endif
@endsection
