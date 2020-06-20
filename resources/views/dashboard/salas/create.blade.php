@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<div class="row justify-content-center"> <h4>SALAS </h4> </div>


<form action="{{ route("salas.store") }}" method="POST">
    @include('dashboard.salas._form')
</form>

@endsection