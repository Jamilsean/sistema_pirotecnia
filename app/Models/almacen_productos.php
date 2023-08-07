<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class almacen_productos extends Model
{
    protected $table='almacen_productos';
    protected $fillable=['fecha_ingreso','cantidad','precio_entrada','productos_id','empresas_id'];
    public $timestamps=false;
}
