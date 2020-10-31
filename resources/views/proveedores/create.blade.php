@extends('layouts.app')

@section('content')

<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <b>Formulario Proveedores</b>
        <a href="{{route('proveedores.index')}}" class="btn btn-dark ml-auto">
        <i class="fa fa-arrow-left"> Volver</i></a>
    </div>
    <div class="card-body">
        <form action="{{route('proveedores.store')}}" method="POST" enctype="multipart/form-data" id="create">
            @include('proveedores.partials.form')
        </form>
    </div>
    <center>
    <div class="card-footer">
        <button class="btn btn-dark" form="create">
            <i class="fa fa-plus"> Crear</i>
        </button>
    </div>
    </center>
</div>

@endsection