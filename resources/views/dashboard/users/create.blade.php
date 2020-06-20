@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<h1> Usuarios </h1>

<form action="{{ route("users.store") }}" method="POST">
    @include('dashboard.users._form',['pasw' => true])
</form>

@endsection