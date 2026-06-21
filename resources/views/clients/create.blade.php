@extends('adminlte::page')

@section('title','Create Client')

@section('content_header')
<h1>Create Client</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body">

        <form action="{{ route('clients.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="form-group col-12 col-md-6">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label>Company</label>
                    <input type="text" name="company" class="form-control">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-12 col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>

            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="Active">
                        Active
                    </option>

                    <option value="Inactive">
                        Inactive
                    </option>

                </select>

            </div>

            <div class="form-group">
                <label>Notes</label>

                <textarea
                    name="notes"
                    class="form-control"
                    rows="4">
                </textarea>

            </div>

            <button class="btn btn-success d-block d-md-inline-block">
                Save Client
            </button>

        </form>

    </div>

</div>

@stop