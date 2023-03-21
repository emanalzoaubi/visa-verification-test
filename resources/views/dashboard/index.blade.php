@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-8">


            <div class="card">
                <div class="card-header">Send Welcome Email</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('send-email') }}">
                        @csrf

                        <div class="form-group row">


                            <div class="col-xs-12">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-xs-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Send Email
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
