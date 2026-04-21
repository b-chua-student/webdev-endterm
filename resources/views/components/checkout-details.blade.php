@php $user = Auth::user(); @endphp

<div style="color: #700101; font-weight: 600; font-size: 14px; margin-bottom: 20px; text-transform: none;">Personal Information</div>
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
    <div>
        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">First Name</label>
        <input type="text" name="first_name" value="{{ $user->first_name }}" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
    </div>
    <div>
        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Last Name</label>
        <input type="text" name="last_name" value="{{ $user->last_name }}" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
    </div>
</div>

@php
$fields = [
    'Username'          => ['name' => 'username',         'value' => $user->username],
    'Instagram Account' => ['name' => 'instagram',        'value' => $user->instagram],
    'Email'             => ['name' => 'email',            'value' => $user->email],
    'Phone Number'      => ['name' => 'phone_number',     'value' => $user->phone_number],
];
@endphp

@foreach($fields as $label => $field)
<div style="margin-bottom: 20px;">
    <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">{{ $label }}</label>
    <input type="text" name="{{ $field['name'] }}" value="{{ $field['value'] }}" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
</div>
@endforeach

<div style="color: #700101; font-weight: 600; font-size: 14px; margin: 40px 0 20px 0;">Address</div>

<div style="margin-bottom: 20px;">
    <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Address</label>
    <input type="text" name="address" value="{{ $user->address }}" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
</div>
