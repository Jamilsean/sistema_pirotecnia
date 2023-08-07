<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
   //cambiar;
   protected $table = 'ventas';
   protected $fillable = [
       'estado',
       'descripcion',
       'clientes_id'
   ];
   
}
