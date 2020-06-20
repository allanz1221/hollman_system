@csrf

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre',$empresas->nombre) }}">
</div>

<div class="form-group">
    <label for="logo_u">Logo (Si ya existe se reemplazara)</label>
    <div class="col-md-6">
      <input type="file" class="form-control" name="logo_u" >
    </div>
  </div>

  <input class="form-control" type="hidden" name="logo" id="logo" value="{{ old('logo',$empresas->logo) }}">

<input type="hidden" id="token" value="{{ csrf_token() }}">

<input type="submit" value="Enviar" class="btn btn-primary">

<a href="{{ route('empresas.index') }}">
    <input type="button" value="Volver" class="btn btn-primary"></a>