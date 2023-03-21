@extends('layouts.app')

@section('content')

<div class="row  d-flex justify-content-center align-items-center h-100">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Please enter your mobile number</div>

            <div class="card-body">
                <form method="POST" name="phone_verification_form" action="{{ route('verify-mobile') }}">
                    @csrf
                    <x-input-field name="country_id" label="Select Country" type="select" :options="$countries" />
                    <x-input-field name="mobile_number" label="Mobile Number" :minlength="7" :maxlength="15" />
                    <x-input-field name="otp_code" label="OTP Code" :maxlength="4" />

                    <div id="error-msg"></div>

                    <div class="form-group row mb-0">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary mt-3 btn-block">
                                Next
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/validate_phonenum.js') }}"></script>
@endsection
