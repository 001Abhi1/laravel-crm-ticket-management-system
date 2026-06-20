@extends('adminlte::page')

@section('title','Clients')

@section('content_header')

<div class="d-flex justify-content-between">

<h1>Clients</h1>

<a href="{{ route('clients.create') }}"
class="btn btn-primary">

Add Client

</a>

</div>

@stop

@section('content')

<div class="card">

<div class="card-body p-0">

<table class="table table-hover">

<thead>

<tr>

<th>Name</th>
<th>Company</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($clients as $client)

<tr>

<td>{{ $client->name }}</td>

<td>{{ $client->company }}</td>

<td>{{ $client->email }}</td>

<td>

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

<td>

<a href="{{ route('clients.edit',$client->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('clients.destroy',$client->id) }}"
method="POST"
style="display:inline">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Delete this client?')">

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

@stop