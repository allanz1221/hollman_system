@extends('dashboard.master')

@section('content')

<h1> Usuarios </h1>
    
<a class="btn btn-success mt-3 mb-3" href="{{ route('users.create') }}">
    Crear
</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>
            <td>
                Empresa
            </td>
            <td>
                Email
            </td>

            <td>
                Actualización
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        @if ($user->rol->nombre != 'admin')
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                @if ($user->empresa_id == NULL)
                  No tiene empresa asociada
                @else

                  {{ $user->empresa->nombre }}
                @endif
            </td>
            <td>
                {{ $user->email }}
            </td>

            <td>
                {{ $user->created_at->format('d-m-Y') }}
            </td>
            <td>
                {{ $user->updated_at->format('d-m-Y') }}
            </td>
            <td>
                <a href="{{ route('users.show',$user->id) }}" class="btn btn-primary">Ver</a>
                <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Actualizar</a>

              
                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}"
                        class="btn btn-danger"><i class="fa fa-trash"></i>Borrar</button>
            </td>
        </tr>
        @endif
       
        @endforeach
    </tbody>
</table>

{{ $users->appends(
    [
        'created_at' => request('created_at'),
        'search' => request('search'),
    ]
    )->links() }}


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Seguro que desea borrar el registro seleccionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                <form id="formDelete" method="POST" action="{{ route('users.destroy',0) }}"
                    data-action="{{ route('users.destroy',0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>


            </div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {

        $('#deleteModal').on('show.bs.modal', function (event) {
                
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        action = $('#formDelete').attr('data-action').slice(0,-1)
        action += id
        console.log(action)

        $('#formDelete').attr('action',action)

        var modal = $(this)
        modal.find('.modal-title').text('Vas a borrar el POST: ' + id)
        });
    };
</script>

@endsection