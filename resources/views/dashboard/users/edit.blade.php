@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<h1> Usuarios </h1>


<form action="{{ route("users.update",$user->id) }}" method="POST">
    @method('PUT')
    @include('dashboard.users._form',['pasw' => false])
</form>

@endsection 