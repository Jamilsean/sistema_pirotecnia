<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $table='productos';
    protected $fillable=['codigo','nombre_producto','descripcion_producto','imagen_url','estado'];
    public $timestamps=false;
}
