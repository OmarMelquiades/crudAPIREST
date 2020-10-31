@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Detalle de Productos</b>
        <a href="{{route('productos.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>

    <div class="card-body">
        <p><b>Nombre:</b> {{$productos->nombre  }} </p>
        <p><b>Descripción:</b> {{$productos->descripcion  }} </p>
        <p><b>Precio:</b> {{$productos->precio  }} </p>
        <p><b>Expiración:</b> {{$productos->expiracion  }} </p>
        <p><b>Stock:</b> {{$productos->stock  }} </p>
        <p><b>idProveedor:</b> {{$productos->idProveedor  }} </p>
       
        
    </div>
    <center>
    <div class="card-footer">   
        <a class="btn btn-dark" href="{{ route('productos.edit', $productos->idProducto) }}">
            <i class="fa fa-edit"> Editar</i>
        </a>
    </div>
    </center>
</div>

@endsection