@csrf

<div class="form-group">
    <label for="">Nombre: </label>
    <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ (isset($productos))? $productos->nombre:old('nombre') }}"></label>
</div>
<div class="form-group">
    <label for="">Descripción:</label>
    <input type="text" class="form-control" placeholder="Descripción" name="descripcion" value="{{ (isset($productos))?$productos->descripcion:old('descripcion') }}"></label>
</div>
<div class="form-group">
    <label for="">Precio:</label>
    <input type="number" min="0" class="form-control" placeholder="pPecio" name="precio" value="{{ (isset($productos))?$productos->precio:old('precio') }}"></label>
</div>
<div class="form-group">
    <label for="">Expiración:</label>
    <input type="date" class="form-control" placeholder="Expiración" name="expiracion" value="{{ (isset($productos))?$productos->expiracion:old('expiracion') }}"></label>
    
</div>
<div class="form-group">
    <label for="">Stock:</label>
    <input type="number" min="1" class="form-control" placeholder="Stock" name="stock" value="{{ (isset($productos))?$productos->stock:old('stock') }}"></label>
</div>
<div class="form-group">
    <label for="">idProveedor:</label>
    <input type="text" class="form-control" placeholder="idProveedor" name="idProveedor" value="{{ (isset($productos))?$productos->idProveedor:old('idProveedor') }}"></label>
</div>
