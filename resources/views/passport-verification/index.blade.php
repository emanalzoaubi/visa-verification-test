@extends('layouts.app')
     
@section('content')
@php
$withComanionOptions =[['id' => 'no', 'name' => 'No'], ['id' => 'yes', 'name' =>'Yes']]
@endphp
<div class="row justify-content-center">
    <div  class="col-md-8">
        <form method="POST" name="visa_form" action="{{ route('visa-submit') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $userId }}">

            <x-visa-form :countries="$countries" :visaDurationOptions="$visaDurationOptions"  />
        
            <x-input-field name="traveling_with_companion" label="Traveling with companion (plus one)?:" type="select" :options="$withComanionOptions" />
        
            <div id="companion-template"  style="display: none;" > 
                <x-visa-form :countries="$countries" :isCompanion="true" :visaDurationOptions="$visaDurationOptions"/>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary mt-3">
                    Save
                    </button>
                </div>
            </div>
        
            
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/validate_visa.js') }}"></script>
@endsection
