@extends('adminlte::page')

@section('title','Clients')

@section('content_header')

<div class="d-flex justify-content-between align-items-center flex-wrap">

    <h1 class="mb-2 mb-md-0">
        Clients
    </h1>

    <a href="{{ route('clients.create') }}"
       class="btn btn-primary">
        Add Client
    </a>

</div>

@stop

@section('content')

<div class="card">

    <div class="card-body p-0">

        <div class="table-responsive rwd-table">

            <table class="table table-bordered table-hover mb-0">

                <thead>

                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

                </thead>

                <tbody>

                @forelse($clients as $client)

                <tr>

                    <td data-label="Name">
                        {{ $client->name }}
                    </td>

                    <td data-label="Company">
                        {{ $client->company }}
                    </td>

                    <td data-label="Email">
                        {{ $client->email }}
                    </td>

                    <td data-label="Status">

                        @if($client->status=="Active")

                            <span class="badge badge-success">
                                Active
                            </span>

                        @else

                            <span class="badge badge-danger">
                                Inactive
                            </span>

                        @endif

                    </td>

                    <td data-label="Actions">

                        <a href="{{ route('clients.edit',$client->id) }}"
                           class="btn btn-warning btn-sm mb-1">
                            Edit
                        </a>

                        <form action="{{ route('clients.destroy',$client->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm mb-1"
                                    onclick="return confirm('Delete this client?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No clients found
                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@stop


@section('css')

<style>

@media (max-width:767.98px){

    .rwd-table table,
    .rwd-table thead,
    .rwd-table tbody,
    .rwd-table th,
    .rwd-table td,
    .rwd-table tr{
        display:block !important;
    }

    .rwd-table thead{
        display:none !important;
    }

    .rwd-table tbody tr{
        border:1px solid #dee2e6 !important;
        border-radius:8px !important;
        margin-bottom:1rem !important;
        padding:.75rem !important;
        background:#fff;
    }

    .rwd-table tbody td{
        border:none !important;
        display:block !important;
        text-align:left !important;
        padding:.45rem 0 !important;
    }

    .rwd-table tbody td::before{
        content:attr(data-label);
        display:block;
        font-size:.75rem;
        font-weight:700;
        color:#6c757d;
        text-transform:uppercase;
        margin-bottom:.2rem;
    }

    .btn-sm{
        margin-bottom:5px;
    }

}

</style>

@stop