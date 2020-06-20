@extends('dashboard.master')

@section('content')

<div class="row justify-content-center"> <h4>EMPRESAS </h4> </div>

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input readonly class="form-control" type="text" name="nombre" id="nombre" value="{{ $empresas->nombre }}">
</div>
{{-- <div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $category->url_clean }}">
</div> --}}


@endsection