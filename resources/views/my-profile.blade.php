@extends('layouts.user')

@section('content')

<div class="container-fluid p-5">
  <div class="text-brand">
    <h1 class="fs-1 mb-5">My Profile</h1>

    <div class="row g-5">
      <!-- Personal Information -->
      <div class="col-lg-6">
        <h2 class="fs-5 fw-bold mb-4">Personal Information</h2>
        
        <div class="row g-3 mb-3">
          <div class="col-6">
            <label for="fname" class="form-label fs-6">First Name</label>
            <input type="text" id="fname" name="fname" value="placeholder" class="form-control text-brand border-brand rounded-3">
          </div>
          <div class="col-6">
            <label for="lname" class="form-label fs-6">Last Name</label>
            <input type="text" id="lname" name="lname" value="placeholder" class="form-control text-brand border-brand rounded-3">
          </div>
        </div>

        <div class="mb-3">
          <label for="instagram_account" class="form-label fs-6">Instagram Account</label>
          <input type="text" id="instagram_account" name="instagram_account" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label fs-6">Email</label>
          <input type="email" id="email" name="email" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>

        <div class="mb-3">
          <label for="phone_no" class="form-label fs-6">Phone Number</label>
          <input type="tel" id="phone_no" name="phone_no" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>
      </div>

      <!-- Address -->
      <div class="col-lg-6">
        <h2 class="fs-5 fw-bold mb-4">Address</h2>
        
        <div class="mb-3">
          <label for="region" class="form-label fs-6">Region, Province, Barangay</label>
          <input type="text" id="region" name="region" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>

        <div class="mb-3">
          <label for="postal_code" class="form-label fs-6">Postal Code</label>
          <input type="text" id="postal_code" name="postal_code" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>

        <div class="mb-3">
          <label for="street" class="form-label fs-6">Street Name, Building, House No.</label>
          <input type="text" id="street" name="street" value="placeholder" class="form-control text-brand border-brand rounded-3">
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

