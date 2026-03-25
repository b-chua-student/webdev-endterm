@extends('layouts.withnavbar')

@section('title', 'Home')

@section('heading', 'Home')

@section('content')
  <h1>
    Welcome,

    @if($user)
      {{ $user->first_name }}
    @else
      Guest
    @endif
  </h1>
@endsection
