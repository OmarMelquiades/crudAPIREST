@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Detalle de Clientes</b>
        <a href="{{route('clientes.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>

    <div class="card-body">
        <p><b>Nombre:</b> {{$clientes->nombre  }} </p>
        <p><b>Apellidos:</b> {{$clientes->apellidoPaterno  }} {{$clientes->apellidoMaterno  }} </p>
        <p><b>RFC:</b> {{$clientes->rfc  }} </p>
        <p><b>Teléfono:</b> {{$clientes->telefono  }} </p>
        <p><b>Correo:</b> {{$clientes->correo  }} </p>
        <p><b>Dirección:</b> {{$clientes->direccion  }} </p>
        <p><b>idProducto:</b> {{$clientes->idProducto  }} </p>
        
    </div>
    <center>
    <div class="card-footer">   
        <a class="btn btn-dark" href="{{ route('clientes.edit', $clientes->idCliente) }}">
            <i class="fa fa-edit"> Editar</i>
        </a>
    </div>
    </center>
</div>

@endsection