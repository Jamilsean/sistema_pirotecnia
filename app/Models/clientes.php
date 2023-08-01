<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
   //cambiar;
   protected $table = 'clientes';
   protected $fillable = [
       'identificador',
       'datos_clientes',
       'celular',
       'direccion'
   ];
   public $timestamps=false;
}
