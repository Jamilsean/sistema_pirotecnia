<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_ventas extends Model
{
   //cambiar;
   protected $table = 'detalle_ventas';
   protected $fillable = [
       'cantidad',
       'precio_venta',
       'estado',
       'ventas_id',
       'productos_id',
   ];
   public $timestamps=false;
}
