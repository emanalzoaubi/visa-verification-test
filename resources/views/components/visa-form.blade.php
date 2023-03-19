@props(['isCompanion' => false, 'countries', 'visaDurationOptions'])

@php
$prefix = $isCompanion ? 'companion_' : '';
$genderOptions =[['id' => 'male', 'name' => 'Male'],['id' => 'female', 'name' => 'Female']];
$visaStatusOptions =[['id' => 'multiple', 'name' => 'Multiple'], ['id' => 'single', 'name' =>'Single']]
@endphp

<h2 class="text-center">{{ $isCompanion ? 'Companion Information' : 'Personal Information' }}</h2>
<x-input-field name="{{ $prefix }}first_name" label="First Name" :errors="$errors" />
<x-input-field name="{{ $prefix }}last_name" label="Last Name" :errors="$errors" />
<x-input-field name="{{ $prefix }}date_of_birth" label="Date of Birth" :errors="$errors" type="date" max="{{ date('Y-m-d') }}" />
<x-input-field name="{{ $prefix }}gender" label="Gender" type="select" :options="$genderOptions" />
<x-input-field name="{{ $prefix }}place_of_birth" label="Place of Birth" type="select" :options="$countries" />
<x-input-field name="{{ $prefix }}country_of_residency" label="Country of Residency" type="select" :options="$countries" />
<x-input-field name="{{ $prefix }}passport_no" label="Passport No" :errors="$errors" />
<x-input-field name="{{ $prefix }}issue_date" label="Issue Date" type="date" :errors="$errors" max="{{ date('Y-m-d') }}" />
<x-input-field name="{{ $prefix }}expiry_date" label="Expiry Date" type="date" :errors="$errors"  min="{{ date('Y-m-d') }}" />
<x-input-field name="{{ $prefix }}place_of_issue" label="Place of Issue" type="select" :options="$countries" />
<x-input-field name="{{ $prefix }}arrival_date" label="Arrival Date" type="date" :errors="$errors" min="{{ date('Y-m-d') }}" />
<x-input-field name="{{ $prefix }}profession" label="Profession" :errors="$errors" />
<x-input-field name="{{ $prefix }}organization" label="Organization" :errors="$errors" />
<x-input-field name="{{ $prefix }}visa_duration" label="Visa duration:" type="select" :options="$visaDurationOptions" />
<x-input-field name="{{ $prefix }}visa_status" label="Visa status:" type="select" :options="$visaStatusOptions"  />
<x-input-field name="{{ $prefix }}passport_picture" label="passport_picture" :errors="$errors" type="file" />
<x-input-field name="{{ $prefix }}personal_picture" label="personal_picture" :errors="$errors" type="file" />
<div>Note: picture most meet requirement in order to apply for VISA</div>
