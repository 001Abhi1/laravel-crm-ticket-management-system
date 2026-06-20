@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<div class="d-flex justify-content-between align-items-center">
    <h1>Users</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add User
    </a>
</div>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <div class="card-tools">

            <input type="text"
                   class="form-control"
                   placeholder="Search User">

        </div>

    </div>

    <div class="card-body p-0">

        <table class="table table-hover">

            <thead>

            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
                <th>Actions</th>

            </tr>

            </thead>

            <tbody>

            @foreach($users as $user)

            <tr>

                <td>
                    {{ $user->name }}
                </td>

                <td>
                    {{ $user->email }}
                </td>

                <td>

                    @foreach($user->getRoleNames() as $role)

                        <span class="badge badge-success">

                            {{ $role }}

                        </span>

                    @endforeach

                </td>

                <td>

                    {{ $user->created_at->format('d M Y') }}

                </td>

                <td>

                   <a href="{{ route('users.edit',$user->id) }}"
class="btn btn-warning btn-sm">
    Edit
</a>

<form action="{{ route('users.destroy',$user->id) }}"
method="POST"
style="display:inline">

    @csrf
    @method('DELETE')

    <button
    class="btn btn-danger btn-sm"
    onclick="return confirm('Delete this user?')">

        Delete

    </button>

</form>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

<div class="mt-3">

    {{ $users->links() }}

</div>

@stop