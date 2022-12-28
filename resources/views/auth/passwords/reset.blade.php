@extends('index')
@section('title', 'Reset Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card col-8">
                <div class="card-header text-center">
                    <h1>{{ __('Reset Password') }}</h1>
                </div>

                <div class="card-body align-self-center justify-items-center">
                    <form method="POST" action="{{ route('password.update') }}" class="row g-3">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="col-12">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="password">{{ __('New Password') }}</label>
                            <input placeholder="New Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="password-confirm">{{ __('Confirm New Password') }}</label>
                            <input placeholder="Confirm New Password" id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                        <hr>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
