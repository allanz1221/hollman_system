@extends('dashboard.master')

@section('content')



<div class="row">
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title">EMPRESAS</h5>
            <p class="card-text">Registro, alta, baja, consulta.</p>
            <a href="{{ route('empresas.index') }}" class="btn btn-primary">Entrar</a><br />
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title">USUARIOS</h5>
            <p class="card-text">Registro, alta, baja, consulta.</p>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Entrar</a><br />
        </div>
      </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SALAS</h5>
            <p class="card-text">Registro, alta, baja, consulta.</p>
            <a href="{{ route('salas.index') }}" class="btn btn-primary">Entrar</a><br />
          </div>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SENSORES</h5>
            <p class="card-text">Registro, alta, baja, consulta.</p>
            <a href="{{ route('sensors.index') }}" class="btn btn-primary">Entrar</a><br />
          </div>
        </div>
      </div>

  </div>


@endsection