@extends('index')
@section('title' , 'Confirm')
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card">
                <div class="card-header text-center"><h1>{{ __('Want to continue access, confirm you password') }}</h1></div>

                <div class="card-body">

                    <form method="POST" action="{{ route('password.confirm') }}" class="row g-3">
                        @csrf

                        <div class="col-12">
                            <label for="password" class="form-label">{{ __('Enter your password to continue.') }}</label>
                            <input placeholder="Your Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Confirm Password') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
