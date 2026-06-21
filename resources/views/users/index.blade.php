@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">

    <h1 class="mb-2 mb-sm-0">Users</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add User
    </a>

</div>
@stop

@section('content')

<div class="card">

    <div class="card-header">

        <div class="card-tools user-search-tools">

            <input type="text"
                   class="form-control"
                   placeholder="Search User">

        </div>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive rwd-table">

            <table class="table table-bordered table-hover mb-0">

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

                @forelse($users as $user)

                    <tr>

                        <td data-label="Name">
                            {{ $user->name }}
                        </td>

                        <td data-label="Email">
                            {{ $user->email }}
                        </td>

                        <td data-label="Role">

                            @foreach($user->getRoleNames() as $role)

                                <span class="badge badge-success">
                                    {{ $role }}
                                </span>

                            @endforeach

                        </td>

                        <td data-label="Created">
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td data-label="Actions">

                            <a href="{{ route('users.edit',$user->id) }}"
                               class="btn btn-warning btn-sm mr-1 mb-1">
                                Edit
                            </a>

                            <form action="{{ route('users.destroy',$user->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm mb-1"
                                        onclick="return confirm('Delete this user?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No users found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

<div class="mt-3 d-flex justify-content-center justify-content-md-end">
    {{ $users->links() }}
</div>

@stop

@section('css')
<style>
    @media (max-width: 767.98px) {
        .rwd-table table,
        .rwd-table thead,
        .rwd-table tbody,
        .rwd-table th,
        .rwd-table td,
        .rwd-table tr {
            display: block !important;
        }

        .rwd-table thead tr {
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
        }

        .rwd-table tbody tr {
            display: block !important;
            margin-bottom: 1rem !important;
            border: 1px solid #dee2e6 !important;
            border-radius: .25rem !important;
            padding: .5rem 0 !important;
        }

        .rwd-table tbody td {
            display: block !important;
            position: static !important;
            float: none !important;
            width: auto !important;
            border: none !important;
            padding: .4rem .75rem !important;
            text-align: left !important;
        }

        .rwd-table tbody td::before {
            content: attr(data-label) !important;
            display: block !important;
            position: static !important;
            width: auto !important;
            font-size: .72rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: .03em !important;
            color: #6c757d !important;
            margin-bottom: .15rem !important;
        }

        .card-header {
            display: block !important;
        }

        .card-header .user-search-tools {
            width: 100% !important;
            margin-left: 0 !important;
            float: none !important;
        }

        .card-header .user-search-tools .form-control {
            width: 100% !important;
        }
    }
</style>
@stop