@extends('layouts.auth')
@section('title', 'Create User')
@section('content')
<div class="d-flex min-vh-100">
    <div class="d-flex flex-column bg-brand text-white" style="width: 260px; flex-shrink: 0;">
        <x-admin-navbar />
    </div>
    <div class="flex-grow-1 p-5 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="display-6 text-brand fw-bold m-0">Create User</p>
            <a href="{{ route('test-admin-user') }}" class="btn btn-outline-secondary">← Back</a>
        </div>
        <div class="bg-white rounded shadow-sm p-4" style="max-width: 600px;">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col">
                        <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">First Name</label>
                        <input type="text" name="first_name" value="{{ old('first_name') }}"
                               class="form-control" style="border-color: #7d0a0a;">
                    </div>
                    <div class="col">
                        <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Last Name</label>
                        <input type="text" name="last_name" value="{{ old('last_name') }}"
                               class="form-control" style="border-color: #7d0a0a;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Password</label>
                    <input type="password" name="password"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Instagram Account</label>
                    <input type="text" name="instagram_acount"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Address</label>
                    <input type="text" name="address"
                           class="form-control" style="border-color: #7d0a0a;">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-semibold text-brand" style="font-size: 0.85rem;">Role</label>
                    <select name="role" class="form-select" style="border-color: #7d0a0a;">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="guest">Guest</option>
                    </select>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="m-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn w-100 text-white fw-semibold"
                        style="background-color: #7d0a0a; border-radius: 6px; padding: 10px;">
                    Create User
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
