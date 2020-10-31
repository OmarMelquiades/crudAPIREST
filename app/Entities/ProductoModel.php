<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model{
    protected $primaryKey = 'idProducto';

    protected $table ='productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'expiracion',
        'stock',
        'idProveedor'
    ];
}