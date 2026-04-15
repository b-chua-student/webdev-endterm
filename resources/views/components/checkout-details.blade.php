<div style="color: #700101; font-weight: 600; font-size: 14px; margin-bottom: 20px; text-transform: none;">Personal Information</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
    <div>
        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">First Name</label>
        <input type="text" placeholder="Placeholder" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
    </div>
    <div>
        <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">Last Name</label>
        <input type="text" placeholder="Placeholder" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
    </div>
</div>

@php $fields = ['Username', 'Instagram Account', 'Email', 'Phone Number']; @endphp
@foreach($fields as $field)
<div style="margin-bottom: 20px;">
    <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">{{ $field }}</label>
    <input type="text" placeholder="Placeholder" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
</div>
@endforeach

<div style="color: #700101; font-weight: 600; font-size: 14px; margin: 40px 0 20px 0;">Address</div>

@php $addressFields = ['Region, Province, Barangay', 'House Unit', 'Street Name, Building, House No.']; @endphp
@foreach($addressFields as $field)
<div style="margin-bottom: 20px;">
    <label style="display: block; font-size: 11px; color: #b1b1b1; margin-bottom: 5px;">{{ $field }}</label>
    <input type="text" placeholder="Placeholder" style="width: 100%; padding: 12px; border: 1px solid #700101; border-radius: 10px; opacity: 0.6;">
</div>
@endforeach