@extends('dashboard.master')

@section('content')

<h1> Usuarios </h1>

<div class="form-group">
    <label for="name">Nombre</label>
    <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
</div>


@endsection