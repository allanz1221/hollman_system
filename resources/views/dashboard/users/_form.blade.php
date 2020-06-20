@csrf

<div class="form-group">
    <label for="name">Nombre</label>
    <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$user->name) }}">
</div>

<div class="form-group">
    <label for="empresa_id">Empresa</label>
    <select class="form-control" name="empresa_id" id="empresa_id">
        @foreach ($empresas as $nombre => $id)
        <option {{ $user->empresa_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $nombre }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input class="form-control" type="email" name="email" id="email" value="{{ old('email',$user->email) }}">
</div>
@if ($pasw)
<div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password" id="password"
        value="{{ old('password',$user->password) }}">
</div>
@endif


<input type="submit" value="Enviar" class="btn btn-primary">

<a href="{{ route('users.index') }}">
<input type="button" value="Volver" class="btn btn-primary"></a>