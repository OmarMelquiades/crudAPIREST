@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Detalle de Proveedores</b>
        <a href="{{route('proveedores.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>

    <div class="card-body">
        <p><b>Razón Social:</b> {{$proveedor->razonSocial  }} </p>
        <p><b>Nombre Completo:</b> {{$proveedor->nombreCompleto  }} </p>
        <p><b>Dirección:</b> {{$proveedor->direccion  }} </p>
        <p><b>Telefono:</b> {{$proveedor->telefono  }} </p>
        <p><b>Correo:</b> {{$proveedor->correo  }} </p>
        <p><b>RFC:</b> {{$proveedor->rfc  }} </p>
        <p><b>Número:</b> {{$proveedor->num  }} </p>
    </div>
    <center>
    <div class="card-footer">   
        <a class="btn btn-dark" href="{{ route('proveedores.edit', $proveedor->idProveedor) }}">
            <i class="fa fa-edit"> Editar</i>
        </a>
    </div>
    </center>
</div>

@endsection