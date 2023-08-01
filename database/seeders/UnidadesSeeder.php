<?php

namespace Database\Seeders;

use App\Models\unidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidad=new unidades();
        $unidad->nombre_unidad='Caja';
        $unidad->abreviatura='Caj';
        $unidad->save();

        $unidad=new unidades();
        $unidad->nombre_unidad='Unidad';
        $unidad->abreviatura='Ud';
        $unidad->save();

    }
}
