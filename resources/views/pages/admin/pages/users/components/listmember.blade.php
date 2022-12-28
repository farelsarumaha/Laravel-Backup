<tbody class="table-primary">
    <td class="border-1 border border-dark"><a href="{{ route('profile.show', $u->user_url) }}"
            class="text-decoration-none text-dark">{{ Str::substr($u->fullname(), 0, 20) }}...</a></td>
    <td class="border-1 border border-dark">{{ $u->email }}</td>
    <td class="text-center border-1 border border-dark">{{ $u->position }}</td>
    <td class="text-center border-1 border border-dark">{{ $u->gender }}</td>
    <td class="text-center border-1 border border-dark">{{ $u->title }}</td>
    <td class="text-center border-1 border border-dark">{{ $u->created_at->locale('id')->isoFormat('Do MMM YYYY') }}</td>
    <td class="text-center border-1 border border-dark">{{ $u->updated_at->diffForHumans() }}</td>
    <td class="text-center table-success border-1 border border-dark">
        <a type="button" class="text-dark text-decoration-none" data-bs-toggle="modal"
            data-bs-target="#editUserTitle{{ $u->id }}">{{ __('Edit') }}</a>
    </td>
    <td class="text-center table-danger border-1 border border-dark">
        <a type="button" class="text-dark text-decoration-none" data-bs-toggle="modal"
            data-bs-target="#removeUserTitle{{ $u->id }}">{{ __('Remove') }}</a>
    </td>
</tbody>
