@extends('pages.admin.index')
@section('title', 'Galaxy Users')
@section('content')
    <div class="container-xxl">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1>{{ __('Galaxy Users List:') }}</h1>
        @if (Auth::user()->title == 'Owner')
            <div class="card-subtitle text-muted">
                <small>{{ __('Total of users:') }} {{ Auth::user()->count() }}</small>
                <br>
                &nbsp;{{ __('|') }}
                <small>{{ __('Number of owners:') }} {{ $totalOwner }}</small>&nbsp;{{ __('|') }}
                <small>{{ __('Number of admins:') }} {{ $totalAdmin }}</small>&nbsp;{{ __('|') }}
                <small>{{ __('Number of members:') }} {{ $totalMember }}</small>&nbsp;{{ __('|') }}
            </div>
        @elseif (Auth::user()->title == 'Admin')
            <div class="card-subtitle text-muted">
                <small>{{ __('Number of members:') }} {{ $totalMember }}</small>
                <br>
                &nbsp;{{ __('|') }}
                <small>{{ __('Number of owners:') }} {{ $totalOwner }}</small>&nbsp;{{ __('|') }}
                <small>{{ __('Number of admins:') }} {{ $totalAdmin }}</small>&nbsp;{{ __('|') }}
            </div>
        @endif
        <hr>
        <form class="d-flex" action="{{ route('admin.profile') }}" method="GET">
            <input class="form-control me-2" type="search" placeholder="{{ __('search to : name, email, title') }}"
                name="search" aria-label="search" value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">{{ __('search') }}</button>
        </form>
        <hr>
        {{ $user->links() }}
        <div class="table-responsive-xxl">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th class="border-1 border border-light">{{ __('Name') }}</th>
                        <th class="border-1 border border-light">{{ __('Email') }}</th>
                        <th class="border-1 border border-light">{{ __('Posision') }}</th>
                        <th class="border-1 border border-light">{{ __('Gander') }}</th>
                        <th class="border-1 border border-light">{{ __('Title') }}</th>
                        <th colspan="2" class="border-1 border border-light">{{ __('Create & Updated') }}</th>
                        <th colspan="2" class="border-1 border border-light">{{ __('Panels') }}</th>
                    </tr>
                </thead>
                @if (Auth::user()->title == 'Admin')
                    @forelse ($user as $u)
                        @if ($u->title == 'Member')
                            @include('pages.admin.pages.users.components.listmember')
                            @include('pages.admin.pages.users.components.editremove')
                        @endif
                    @empty
                        @include('pages.admin.pages.users.components.usersempty')
                    @endforelse
                @elseif (Auth::user()->title == 'Owner')
                    @forelse ($user as $u)
                        @include('pages.admin.pages.users.components.listmember')
                        @include('pages.admin.pages.users.components.editremove')
                    @empty
                        @include('pages.admin.pages.users.components.usersempty')
                    @endforelse
                @endif
            </table>
        </div>
        {{ $user->links() }}
    </div>
@endsection
