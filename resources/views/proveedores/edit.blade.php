@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Formulario Editar Proveedores</b>
        <a href="{{route('proveedores.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>
    <div class="card-body">
        <form action="{{ route('proveedores.update',$proveedor->idProveedor   )}}" method="POST" enctype="multipart/form-data" id="create">
            @method('PUT')
            @include('proveedores.partials.form')
        </form>
    </div>
    <center>
    <div class="card-footer">
        <button class="btn btn-primary" form="create">
            <i class="fa fa-save"> Guardar</i>
        </button>
        <button type="submit" class="btn btn-danger" form="delete_{{$proveedor->idProveedor}}"
            onclick="return confirm('¿Estas seguro que deseas eliminar el item?')">
            <i class="fa fa-trash"> Eliminar</i>
        </button>
        <form action="{{route('proveedores.destroy', $proveedor->idProveedor)}}" 
        id="delete_{{$proveedor->idProveedor}}" method="post" enctype="multipart/form-data" hidden>
            @csrf
            @method('DELETE')
        </form>
    </div>
    </center>
</div>

@endsection