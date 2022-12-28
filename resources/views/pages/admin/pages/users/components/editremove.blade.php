{{-- Modal Edit User --}}
<div class="modal fade" id="editUserTitle{{ $u->id }}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editUserLabel">{{ __('Edit title:') }}
                    {{ $u->fullName() }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.profile.update', $u->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <select name="title" id="title" class="form-select">
                            @auth
                                @if (Auth::user()->title == 'Owner')
                                    @foreach (['Member' => 'Member', 'Admin' => 'Admin', 'Owner' => 'Owner'] as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('title', $u->title) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                @elseif (Auth::user()->title == 'Admin')
                                    @foreach (['Member' => 'Member'] as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ old('title', $u->title) == $key ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                @endif
                            @endauth
                        </select>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>

                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Remove User --}}
<div class="modal fade" id="removeUserTitle{{ $u->id }}" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="removeUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="removeUserLabel">{{ __('Are you sure you want to delete the user:') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.profile.delete', $u->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" type="text"
                                value="{{ __('Name :') }} {{ $u->fullName() }}" disabled readonly>
                            <br>
                            <input class="form-control" type="text" value="{{ __('Email :') }} {{ $u->email }}"
                                disabled readonly>
                        </div>
                        <br>
                        <div class="text-muted card-subtitle">
                            <small>{{ __('Be careful please check first for the next step.') }}
                                <a href="{{ route('forum') }}" class="text-decoration-none">{{ __('Learn more') }}</a>
                            </small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('No') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
