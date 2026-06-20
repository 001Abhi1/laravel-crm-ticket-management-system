@extends('adminlte::page')

@section('title','Edit Ticket')

@section('content_header')
<h1>Edit Ticket</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('tickets.update',$ticket) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Client</label>

                <select name="client_id" class="form-control">

                    @foreach($clients as $client)

                        <option
                            value="{{ $client->id }}"
                            {{ $ticket->client_id == $client->id ? 'selected' : '' }}>

                            {{ $client->name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <br>

            <div class="form-group">
                <label>Assign Admin</label>

                <select name="user_id" class="form-control">

                    <option value="">
                        Not Assigned
                    </option>

                    @foreach($admins as $admin)

                        <option
                            value="{{ $admin->id }}"
                            {{ $ticket->user_id == $admin->id ? 'selected' : '' }}>

                            {{ $admin->name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <br>

            <div class="form-group">
                <label>Subject</label>

                <input
                    type="text"
                    name="subject"
                    value="{{ $ticket->subject }}"
                    class="form-control">
            </div>

            <br>

            <div class="form-group">
                <label>Description</label>

                <textarea
                    name="description"
                    class="form-control"
                    rows="4">{{ $ticket->description }}</textarea>
            </div>

            <br>

            <div class="form-group">
                <label>Priority</label>

                <select name="priority" class="form-control">

                    <option value="Low" {{ $ticket->priority=='Low' ? 'selected' : '' }}>
                        Low
                    </option>

                    <option value="Medium" {{ $ticket->priority=='Medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="High" {{ $ticket->priority=='High' ? 'selected' : '' }}>
                        High
                    </option>

                </select>
            </div>

            <br>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Open" {{ $ticket->status=='Open' ? 'selected' : '' }}>
                        Open
                    </option>

                    <option value="In Progress" {{ $ticket->status=='In Progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="Closed" {{ $ticket->status=='Closed' ? 'selected' : '' }}>
                        Closed
                    </option>

                </select>
            </div>

            <br>

            <button class="btn btn-primary">
                Update Ticket
            </button>

        </form>

    </div>
</div>

@stop