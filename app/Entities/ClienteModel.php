<?php

namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model{
    
    protected $primaryKey = 'idCliente';

    protected $table ='clientes';
    protected $fillable = [
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'rfc',
        'telefono',
        'correo',
        'direccion',
        'idProducto',
    ];
}
