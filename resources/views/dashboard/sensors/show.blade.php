@extends('dashboard.master')

@section('content')

<div class="row justify-content-center"> <h4>SENSORES </h4> </div>


<div class="form-group">
    <label for="nombre">Nombre</label>
    <input readonly class="form-control" type="text" name="nombre" id="nombre" value="{{ $sensor->nombre }}">
</div>

<div class="form-group">
    <label for="nombre">Sala</label>
    <input readonly class="form-control" type="text" name="sala_id" id="sala_id" value="{{ $sensor->sala_id }}">
</div>

@endsection