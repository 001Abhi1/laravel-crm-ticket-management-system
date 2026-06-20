@extends('adminlte::page')

@section('title','Tickets Dashboard')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">
    <h1>Tickets Dashboard</h1>

    <a href="{{ route('tickets.create') }}"
       class="btn btn-primary">
        + Create Ticket
    </a>
</div>

@stop

@section('content')

{{-- STATS CARDS --}}
<div class="row">

    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $tickets->count() }}</h3>
                <p>Total Tickets</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $tickets->where('status','Open')->count() }}</h3>
                <p>Open Tickets</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ $tickets->where('status','In Progress')->count() }}</h3>
                <p>In Progress</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
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

    <div class="card-body">

        <table class="table table-bordered table-hover">

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

                    <td>{{ $ticket->id }}</td>

                    <td>{{ $ticket->subject }}</td>

                    <td>
                        {{ $ticket->client?->name ?? '-' }}
                    </td>

                    <td>

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

                    <td>

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

                    <td>

                        {{ $ticket->user?->name ?? 'Not Assigned' }}

                    </td>

                    <td>

                        <a href="{{ route('tickets.edit',$ticket) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('tickets.destroy',$ticket) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
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

@stop