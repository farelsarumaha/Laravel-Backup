@extends('index')
@section('title', 'Verify')
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card col-8">
                <div class="card-header text-center"><h1>{{ __('Verify Your Email Address') }}</h1></div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p>{{ __('you must verify first to access this') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" class="row g-3">
                        @csrf
                        <button type="submit"
                            class="text-decoration-none btn btn-link p-0 m-0 align-baseline">{{ __('click here for the next step.') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
