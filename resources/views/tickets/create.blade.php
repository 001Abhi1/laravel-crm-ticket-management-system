@extends('adminlte::page')

@section('title','Create Ticket')

@section('content_header')
<h1>Create Ticket</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('tickets.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="form-group col-12 col-md-6">
                    <label>Client</label>

                    <select name="client_id" class="form-control">

                        @foreach($clients as $client)

                            <option value="{{ $client->id }}">
                                {{ $client->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label>Assign Admin</label>

                    <select name="user_id" class="form-control">

                        <option value="">
                            Not Assigned
                        </option>

                        @foreach($admins as $admin)

                            <option value="{{ $admin->id }}">
                                {{ $admin->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="row">

                <div class="form-group col-12 col-md-6">
                    <label>Priority</label>

                    <select name="priority" class="form-control">

                        <option value="Low">Low</option>

                        <option value="Medium" selected>
                            Medium
                        </option>

                        <option value="High">
                            High
                        </option>

                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="Open">
                            Open
                        </option>

                        <option value="In Progress">
                            In Progress
                        </option>

                        <option value="Closed">
                            Closed
                        </option>

                    </select>
                </div>

            </div>

            <button class="btn btn-success d-block d-md-inline-block">
                Create Ticket
            </button>

        </form>

    </div>
</div>

@stop