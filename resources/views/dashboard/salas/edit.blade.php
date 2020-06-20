@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<div class="row justify-content-center"> <h4>SALAS </h4> </div>


<form action="{{ route("salas.update",$sala->id) }}" method="POST">
    @method('PUT')
    @include('dashboard.salas._form')

</form>

@endsection 