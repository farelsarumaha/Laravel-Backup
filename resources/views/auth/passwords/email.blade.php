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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="row g-3">
                        @csrf
                        <div class="col">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input placeholder="Email Address" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
