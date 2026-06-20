@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
<h1>Create User</h1>
@stop

@section('content')

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card card-primary">

<div class="card-header">
<h3 class="card-title">
Add New User
</h3>
</div>

<form action="{{ route('users.store') }}" method="POST">

@csrf

<div class="card-body">

<div class="form-group">
<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>
</div>

<div class="form-group">
<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>
</div>

<div class="form-group">
<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>
</div>

<div class="form-group">

<label>Role</label>

<select
name="role"
class="form-control">

@foreach($roles as $role)

<option value="{{ $role->name }}">
{{ $role->name }}
</option>

@endforeach

</select>

</div>

</div>

<div class="card-footer">

<button class="btn btn-success">

Save User

</button>

<a href="{{ route('users.index') }}"
class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

</div>

</div>

@stop
