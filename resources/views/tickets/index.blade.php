
@extends('adminlte::page')

@section('title','Tickets Dashboard')

@section('content_header')
<div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">

    <h1 class="mb-2 mb-sm-0">Tickets Dashboard</h1>

    <a href="{{ route('tickets.create') }}" class="btn btn-primary">
        + Create Ticket
    </a>

</div>
@stop

@section('content')

{{-- STATS CARDS --}}
<div class="row">

    <div class="col-6 col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $tickets->count() }}</h3>
                <p>Total Tickets</p>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $tickets->where('status','Open')->count() }}</h3>
                <p>Open Tickets</p>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $tickets->where('status','In Progress')->count() }}</h3>
                <p>In Progress</p>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $tickets->where('status','Closed')->count() }}</h3>
                <p>Closed</p>
            </div>
        </div>
    </div>

</div>


{{-- TABLE --}}
<div class="card">

    <div class="card-body p-0 p-md-3">

        <div class="table-responsive rwd-table">

            <table class="table table-bordered table-hover mb-0">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Subject</th>
                        <th>Client</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($tickets as $ticket)

                    <tr>

                        <td data-label="ID">{{ $ticket->id }}</td>

                        <td data-label="Subject">{{ $ticket->subject }}</td>

                        <td data-label="Client">
                            {{ $ticket->client?->name ?? '-' }}
                        </td>

                        <td data-label="Priority">

                            @if($ticket->priority == 'High')

                                <span class="badge badge-danger">
                                    High
                                </span>

                            @elseif($ticket->priority == 'Medium')

                                <span class="badge badge-warning">
                                    Medium
                                </span>

                            @else

                                <span class="badge badge-success">
                                    Low
                                </span>

                            @endif

                        </td>

                        <td data-label="Status">

                            @if($ticket->status == 'Open')

                                <span class="badge badge-primary">
                                    Open
                                </span>

                            @elseif($ticket->status == 'In Progress')

                                <span class="badge badge-warning">
                                    In Progress
                                </span>

                            @else

                                <span class="badge badge-success">
                                    Closed
                                </span>

                            @endif

                        </td>

                        <td data-label="Assigned To">
                            {{ $ticket->user?->name ?? 'Not Assigned' }}
                        </td>

                        <td data-label="Action">

                            <a href="{{ route('tickets.edit',$ticket) }}"
                               class="btn btn-warning btn-sm mr-1 mb-1">
                                Edit
                            </a>

                            <form action="{{ route('tickets.destroy',$ticket) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm mb-1"
                                        onclick="return confirm('Delete this ticket?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center">
                            No tickets found
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
    }
</style>
@stop