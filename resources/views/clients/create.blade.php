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

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<br>

<div class="form-group">
<label>Company</label>
<input type="text" name="company" class="form-control">
</div>

<br>

<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<br>

<div class="form-group">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<br>

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

<br>

<div class="form-group">
<label>Notes</label>

<textarea
name="notes"
class="form-control"
rows="4">
</textarea>

</div>

<br>

<button class="btn btn-success">

Save Client

</button>

</form>

</div>

</div>

@stop