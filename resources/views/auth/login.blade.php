@extends('index')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card col-8">
                <div class="card-header text-center">
                    <h1>{{ __('Login') }}</h1>
                </div>
                {{--  --}}
                <div class="card-body align-self-center justify-items-center">
                    <form method="POST" action="{{ route('login') }}" class="row g-3">
                        @csrf
                        <div class="col-12">
                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="Email Address" value="{{ old('email') }}" autocomplete="email"
                                autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="form-check pt-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="col">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
@endsection
