<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidades extends Model
{
    protected $table='unidades';
    protected $fillable=['nombre_unidad','abreviatura','estado','borrado'];
    public $timestamps=false;
}
