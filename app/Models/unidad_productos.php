<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidad_productos extends Model
{
    //cambiar;
   protected $table = 'empresas';
   protected $fillable = [
       'nombre_empresa',
       'ruc_empresa',
       'telefono_empresa'
   ];
   public $timestamps=false;
}
