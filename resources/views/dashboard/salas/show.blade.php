@extends('dashboard.master')

@section('content')

<div class="row justify-content-center"> <h4>SALAS </h4> </div>


<div class="form-group">
    <label for="nombre">Nombre</label>
    <input readonly class="form-control" type="text" name="nombre" id="nombre" value="{{ $sala->nombre }}">
</div>

<div class="form-group">
    <label for="nombre">Empresa</label>
    <input readonly class="form-control" type="text" name="empresa_id" id="empresa_id" value="{{ $sala->empresa_id }}">
</div>

@endsection