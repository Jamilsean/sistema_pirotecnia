<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas extends Model
{
    //use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'nombre_empresa',
        'ruc_empresa',
        'telefono_empresa'
    ];
    public $timestamps=false;
}
