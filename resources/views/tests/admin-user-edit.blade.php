@extends('layouts.auth')

@section('title', 'User Management')

@section('content')

<div class="d-flex">
    <div class="d-flex flex-column w-25 bg-brand min-vh-100 text-white">
        <x-admin-navbar />
    </div>
    <div>
        <p class="display-6"> User Management </p>
        <x-edit-form
            :item="$user"
            update-route="users.update"
            :array-exclude="['id', 'created_at', 'updated_at', 'remember_token', 'password']"
        />
    </div>
</div>

@endsection
