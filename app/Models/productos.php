<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table='productos';
    protected $fillable=['codigo','nombre_producto','descripcion_producto','precio_venta','stock','imagen_url','estado','borrado'];
    public $timestamps=false;
}
