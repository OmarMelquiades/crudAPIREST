@extends('layouts.app')

@section('content')



<div class="card mt-3">

    <!-- DIV PARA BOTÓN CREAR -->
    <div class="card-header d-inline-flex">
        <b>CLIENTES </b>
        <a href="{{ route('clientes.create')}}" class="btn btn-dark ml-auto">
            <i class="fa fa-plus"></i>
            Agregar
        </a>
    </div>
    <a href="{{ route('clientes.pdf') }}" class="btn btn-dark ml-auto">
        <i class="fa fa-file-pdf text-danger"></i> PDF
    </a>

    <div class="card-body">
        <div class=row>
            <div class="col-4">
                <div class="form-group m-0">
                    <label>
                        Paginación:
                    </label>

                    <!-- Limitar tamaño de consulta en la tabla -->
                    <select class="form-control" id="limit" name="limit">
                        @foreach ([10,20,50,100] as $limit)
                        <option value="{{$limit}}" @if (isset($_GET['limit']))
                            {{($_GET['limit']==$limit)?'selected':''}} @endif>{{$limit}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label>
                        Buscar:
                    </label>
                    <input class="form-control" id="search" name="search" type="text" value="{{(isset($_GET['search']))?$_GET['search']:''}}">
                </div>
            </div>
        </div>

        @if($clientes->total() > 10)
        {{$clientes->links()}}
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>RFC</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        {{$cliente->idCliente }}
                    </td>
                    <td>
                        {{ $cliente->nombre}}
                    </td>
                    <td>
                        {{ $cliente->apellidoPaterno}} {{ $cliente->apellidoMaterno}}
                    </td>
                    <td>
                        {{ $cliente->rfc}}
                    </td>
                    <td>
                        {{ $cliente->telefono}}
                    </td>
                    <td>
                        {{ $cliente->correo}}
                    </td>

                    
                    <td>
                        <div class="btn-group" role="group" aria-label="Acciones">
                            <a href="{{ route('clientes.show', $cliente->idCliente) }}" class="btn btn-default btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('clientes.edit', $cliente->idCliente) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-sm" form="delete_{{$cliente->idCliente}}"
                                onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
                                <i class="fa fa-trash"></i>
                            </button>
                            <form action="{{route('clientes.destroy', $cliente->idCliente)}}" id="delete_{{$cliente->idCliente}}" 
                            method="post" enctype="multipart/form-data" hidden>
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        @if($clientes->total() > 10)
        {{$clientes->links()}}
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$('#limit').on('change', function() {
    window.location.href = '{{ route( "clientes.index" ) }}?limit=' + $(this).val() + '&search=' + $('#search').val()
})

$('#search').on('keyup', function(e) {
    if (e.keyCode == 13) {
        window.location.href = '{{ route("clientes.index") }}?limit=' + $('#limit').val() + '&search=' + $(this).val()
    }
})
</script>
@endsection