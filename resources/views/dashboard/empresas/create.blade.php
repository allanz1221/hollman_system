@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validation-error')

<div class="row justify-content-center"> <h4>EMPRESAS </h4> </div>


<form action="{{ route("empresas.store") }}" method="POST" enctype="multipart/form-data">
    @include('dashboard.empresas._form')
</form>

@endsection