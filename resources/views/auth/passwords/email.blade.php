@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header reset-title d-flex justify-content-center">{{ __('Reset Password') }}</div>
                <div class="reset-notice d-flex justify-content-center">Enter email to reset your password</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group d-flex align-items-center flex-column mr-0">
                            <label for="email" class="width-reset-email col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="width-reset-email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-flex justify-content-center w-100">
                                <button type="submit" class="btn btn-primary btn-course-join m-0">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
