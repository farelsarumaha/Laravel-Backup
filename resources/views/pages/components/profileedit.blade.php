<div class="modal fade" id="exampleModal{{ $user->user_url }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile:</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.edit', $user->user_url) }}" method="post" class="row g-3">
                    @csrf
                    @method('PATCH')
                    <div class="col-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input placeholder="First name" aria-label="First name" id="first_name"
                            autocomplete="first_name" value="{{ $user->first_name }}"
                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                            type="text" autofocus>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input placeholder="Last Name" aria-label="Last Name" id="last_name" autocomplete="last_name"
                            value="{{ $user->last_name }}" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" type="text" autofocus>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select">
                            @foreach (['Pria' => 'Pria', 'Perempuan' => 'Perempuan'] as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('gender', $user->gender) == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-9">
                        <label for="position" class="form-label">Position:</label>
                        <select id="position" name="position" class="form-select">
                            @foreach (['Developer' => 'Developer', 'Customer' => 'Customer', 'Student' => 'Student'] as $key => $value)
                                <option value="{{ $key }}"
                                    {{ old('position', $user->position) == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
