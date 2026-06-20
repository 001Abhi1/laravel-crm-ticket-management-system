@extends('adminlte::page')

@section('title','Edit User')

@section('content_header')
<h1>Edit User</h1>
@stop

@section('content')

<div class="card">

<div class="card-body">

<form action="{{ route('users.update',$user->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="{{ $user->name }}">

</div>

<br>

<div class="form-group">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="{{ $user->email }}">

</div>

<br>

<div class="form-group">

<label>Role</label>

<select
name="role"
class="form-control">

@foreach($roles as $role)

<option
value="{{ $role->name }}"
{{ $user->hasRole($role->name) ? 'selected' : '' }}>

{{ $role->name }}

</option>

@endforeach

</select>

</div>

<br>

<button class="btn btn-success">

Update User

</button>

</form>

</div>

</div>

@stop