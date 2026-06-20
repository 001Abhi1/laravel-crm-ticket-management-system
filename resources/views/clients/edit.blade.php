@extends('adminlte::page')

@section('title','Edit Client')

@section('content_header')
<h1>Edit Client</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('clients.update',$client->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Name</label>

<input type="text"
name="name"
class="form-control"
value="{{ $client->name }}">
</div>

<br>

<div class="form-group">
<label>Company</label>

<input type="text"
name="company"
class="form-control"
value="{{ $client->company }}">
</div>

<br>

<div class="form-group">
<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="{{ $client->email }}">
</div>

<br>

<div class="form-group">
<label>Phone</label>

<input type="text"
name="phone"
class="form-control"
value="{{ $client->phone }}">
</div>

<br>

<div class="form-group">

<label>Status</label>

<select name="status"
class="form-control">

<option value="Active"
{{ $client->status=='Active' ? 'selected' : '' }}>

Active

</option>

<option value="Inactive"
{{ $client->status=='Inactive' ? 'selected' : '' }}>

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
rows="4">{{ $client->notes }}</textarea>

</div>

<br>

<button class="btn btn-success">

Update Client

</button>

</form>

</div>

</div>

@stop