@extends('index')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row justify-content-center m-5">
            <div class="card col-8">
                <div class="card-header text-center">
                    <h1>{{ __('Register') }}</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="row g-3">
                        @csrf
                        {{--  --}}
                        <div class="col-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input placeholder="First name" aria-label="First name" id="first_name"
                                autocomplete="first_name" value="{{ old('first_name') }}"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                type="text" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="col-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input placeholder="Last Name" aria-label="Last Name" id="last_name" autocomplete="last_name"
                                value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" type="text" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input placeholder="Email Address" aria-label="Email Address" id="email"
                                autocomplete="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" name="email" type="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="col-6">
                            <label for="password" class="form-label">Password</label>
                            <input placeholder="Password" aria-label="Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="col-6">
                            <label for="password-confirm" class="form-label">Confirm Password</label>
                            <input placeholder="Confirm Password" aria-label="Confirm Password" id="password-confirm"
                                type="password" class="form-control" name="password_confirmation"
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <label for="gender" class="form-label">Gender:</label>
                            <select id="gender" name="gender" class="form-select">
                                @foreach (['Pria' => 'Pria', 'Perempuan' => 'Perempuan'] as $key => $value)
                                    <option value="{{ $key }} {{ old('gender') == $key ? 'selected' : '' }}">
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {{--  --}}
                        <div class="col-8">
                            <label for="position" class="form-label">Position:</label>
                            <select id="position" name="position" class="form-select">
                                @foreach (['Developer' => 'Developer', 'Customer' => 'Customer', 'Student' => 'Student'] as $key => $value)
                                    <option value="{{ $key }} {{ old('position') == $key ? 'selected' : '' }}">
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
