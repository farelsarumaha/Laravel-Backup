@extends('index')
@section('title', 'Profile')
@section('content')
    <div class="container border">
        <div class="m-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="d-flex ">
                <img src="{{ asset('images/icon.png') }}" alt="Avatar Profile" height="95px" width="95px"
                    class="border border-5 border-dark border-opacity-75 rounded-circle">
                <div class="m-3 p-0">
                    <h5 class="card-title">{{ $user->fullName() }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $user->title }}</h6>
                    @auth
                        @if (Auth::user()->id == $user->id)
                            <small>
                                <a class="btn-link text-decoration-none" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $user->user_url }}">{{ __('Edit Profile') }}</a>
                                @include('pages.components.profileedit')
                            </small>
                        @endif
                    @endauth
                </div>
            </div>
            <hr>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="#post">{{ __('Post') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">{{ __('Contacts') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">{{ __('Abouts') }}</a>
                </li>
            </ul>
            <hr>
            <br><br>
            <div id="about">
                <h3>{{ __('About:') }}</h3>
                <div class="card m-3 shadow">
                    <div class="card-body">
                        <p class="nav-link">{{ __('Gender:') }}&nbsp;{{ $user->gender }}</p>
                        <p class="nav-link">{{ __('Position:') }}&nbsp;{{ $user->position }}</p>
                        <p class="nav-link">
                            {{ __('Join on:') }}&nbsp;{{ $user->created_at->locale('id')->isoFormat('Do MMM YYYY') }}</p>
                    </div>
                </div>
            </div>
            {{-- <br><br> --}}
            {{-- <div id="post">
                <h3>Post:</h3>
                <div class="card m-3 shadow">
                    <div class="card-body">
                        <h5 class="card-title">Joko</h5>
                        <p class="card-subtitle"><small class="text-muted">LAo
                            </small><span>|</span><small class="text-muted"> Last updated
                                ok</small></p><br>
                        <p class="card-text">test</p>
                        <a class="btn btn-link p-0 m-0 text-decoration-none" href="#" role="button">Lihat detail
                            postingan</a>
                    </div>
                </div>
                <div class="card m-3 shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title">Has no posts</h5>
                    </div>
                </div>
            </div> --}}
            {{-- <br><br> --}}
            <div id="contact">
                <h3>{{ __('Contact:') }}</h3>
                <div class="card m-3 shadow">
                    <div class="card-body">
                        <p class="nav-link">{{ __('Email:') }}&nbsp;{{ $user->email }}</p>
                        {{-- <p class="nav-link">{{ __('Discord: Okebos!') }} </p>
                        <p class="nav-link">{{ __('Phone: +62-823-6360-5997') }} </p>
                        <p class="nav-link">{{ __('Instagram: farellsrmh_') }} </p>
                        <p class="nav-link">{{ __('Facebook: Farell Sarumaha') }} </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
