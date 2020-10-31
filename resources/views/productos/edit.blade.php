@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Formulario Editar Producto</b>
        <a href="{{route('productos.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>
    <div class="card-body">
        <form action="{{ route('productos.update', $productos->idProducto   )}}" method="POST" enctype="multipart/form-data" id="create">
            @method('PUT')
            @include('productos.partials.form')
        </form>
    </div>
    <center>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
            <i class="fa fa-save"> Guardar</i>
        </button>
        <button type="submit" class="btn btn-danger" form="delete_{{ $productos->idProducto}}"
            onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
            <i class="fa fa-trash"> Eliminar</i>
        </button>
        <form action="{{route('productos.destroy',  $productos->idProducto)}}" 
        id="delete_{{$productos->idProducto}}" method="post" enctype="multipart/form-data" hidden>
            @csrf
            @method('DELETE')
        </form>
    </div>
    </center>
</div>

@endsection