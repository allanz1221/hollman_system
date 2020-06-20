@csrf

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre',$sala->nombre) }}">
</div>



<div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select class="form-control" name="empresa_id" id="empresa_id">
        @foreach ($empresa as $nombre => $id)
        <option {{ $sala->empresa_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $nombre }}</option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="temperatura">Temperatura</label>
    <input class="form-control" type="number" name="temperatura" id="temperatura" value="{{ old('temperatura',$sala->temperatura) }}">
</div>

<div class="form-group">
    <label for="t_mas">Tolerancia Maxima (se le suma a la temperatura)</label>
    <input class="form-control" type="number" name="t_mas" id="t_mas" value="{{ old('t_mas',$sala->t_mas) }}">
</div>

<div class="form-group">
    <label for="t_menos">Tolerancia Minima (se le resta a la temperatura)</label>
    <input class="form-control" type="number" name="t_menos" id="t_menos" value="{{ old('t_menos',$sala->t_menos) }}">
</div>


<input type="submit" value="Enviar" class="btn btn-primary">

<a href="{{ route('salas.index') }}">
    <input type="button" value="Volver" class="btn btn-primary"></a>