@extends('layouts.withnavbar')

@section('title', 'Signup')

@section('heading', 'Signup')

@section('content')
  <form action="/contact" method="POST">
      @csrf

      <label for="fname">First Name:</label>
      <input type="text" name="fname"><br>

      <label for="lname">Last Name:</label>
      <input type="text" name="lname"><br>

      <label for="email">Email:</label>
      <input type="email" name="email"><br>

      <label for="password">Password:</label>
      <input type="password" name="password"><br>

      <button type="submit">Submit</button>
  </form>

@endsection
