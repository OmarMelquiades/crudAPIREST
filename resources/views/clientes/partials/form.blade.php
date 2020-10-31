@csrf

<div class="form-group">
    <label for="">Nombre: </label>
    <input for="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ (isset($cliente))? $cliente->nombre:old('nombre') }}"></label>
</div>
<div class="form-group">
    <label for="">Apellido Paterno:</label>
    <input for="text" class="form-control" placeholder="Apellido Paterno" name="apellidoPaterno" value="{{ (isset($cliente))?$cliente->apellidoPaterno:old('apellidoPaterno') }}"></label>
</div>
<div class="form-group">
    <label for="">Apellido Materno:</label>
    <input for="text" class="form-control" placeholder="Apellido Materno" name="apellidoMaterno" value="{{ (isset($cliente))?$cliente->apellidoMaterno:old('apellidoMaterno') }}"></label>
</div>
<div class="form-group">
    <label for="">RFC:</label>
    <input for="text" class="form-control" placeholder="RFC" name="rfc" value="{{ (isset($cliente))?$cliente->rfc:old('rfc') }}"></label>
</div>
<div class="form-group">
    <label for="">Telefono:</label>
    <input for="text" class="form-control" placeholder="Telefono" name="telefono" value="{{ (isset($cliente))?$cliente->telefono:old('telefono') }}"></label>
</div>
<div class="form-group">
    <label for="">Correo:</label>
    <input for="mail" class="form-control" placeholder="Correo" name="correo"  value="{{ (isset($cliente))?$cliente->correo:old('correo') }}"></label>
</div>
<div class="form-group">
    <label for="">Dirección:</label>
    <input for="text" class="form-control" placeholder="Dirección" name="direccion" value="{{ (isset($cliente))?$cliente->direccion:old('direccion') }}"></label>
</div>
<div class="form-group">
    <label for="">idProducto:</label>
    <input for="number" class="form-control" placeholder="idProducto" name="idProducto" value="{{ (isset($cliente))?$cliente->idProducto:old('idProducto') }}"></label>
</div>
