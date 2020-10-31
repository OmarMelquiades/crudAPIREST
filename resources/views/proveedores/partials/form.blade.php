@csrf
<div class="form-group">
    <label for="">Numero</label>
    
     <?php if(isset($proveedor['num'])):?>
         <input type="number" class="form-control" name="numeroAtenPresupuestaria"
         value="<?php echo $proveedor["num"]?>" readonly>  
     <?php else: ?>
        <input type="number" class="form-control" name="nmeroAtenPresupuestaria"
     value="{{ (isset($numero))?  $numero:old('numero') }}" readonly>
     <?php endif ?>
</div>
<div class="form-group">
    <label for="">Razón Social</label>
    <input for="text" class="form-control" placeholder="Razón Social" name="razonSocial" value="{{ (isset($proveedor))?$proveedor->razonSocial:old('razonSocial') }}"></label>
</div>
<div class="form-group">
    <label for="">Nombre Completo:</label>
    <input for="text" class="form-control" placeholder="Nombre Completo" name="nombreCompleto" value="{{ (isset($proveedor))?$proveedor->nombreCompleto:old('nombreCompleto') }}"></label>
</div>
<div class="form-group">
    <label for="">Dirección:</label>
    <input for="text" class="form-control" placeholder="Dirección" name="direccion" value="{{ (isset($proveedor))?$proveedor->direccion:old('direccion') }}"></label>
</div>
<div class="form-group">
    <label for="">Telefono:</label>
    <input for="text" class="form-control" placeholder="Telefono" name="telefono" value="{{ (isset($proveedor))?$proveedor->telefono:old('telefono') }}"></label>
</div>
<div class="form-group">
    <label for="">Correo:</label>
    <input for="mail" class="form-control" name="correo"  value="{{ (isset($proveedor))?$proveedor->correo:old('correo') }}"></label>
</div>
<div class="form-group">
    <label for="">RFC:</label>
    <input for="text" class="form-control" name="rfc" value="{{ (isset($proveedor))?$proveedor->rfc:old('rfc') }}"></label>
</div>