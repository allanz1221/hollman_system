@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<div class="row justify-content-center"> <h4>SENSORES </h4> </div>


<form action="{{ route("sensors.update",$sensor->id) }}" method="POST">
    @method('PUT')
    @include('dashboard.sensors._form')

</form>

@endsection 