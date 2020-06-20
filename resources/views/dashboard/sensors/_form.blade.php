@csrf

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre',$sensor->nombre) }}">

</div>


<div class="form-group">
    <label for="empresa_id">Salas</label>
    <select class="form-control" name="sala_id" id="sala_id">
        @foreach ($salas as $nombre => $id)
        <option {{ $sensor->salas_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">ID: {{ $id }} {{ $nombre }}</option>
        @endforeach
    </select>
</div>


<input type="submit" value="Enviar" class="btn btn-primary">

<a href="{{ route('sensors.index') }}">
    <input type="button" value="Volver" class="btn btn-primary"></a>