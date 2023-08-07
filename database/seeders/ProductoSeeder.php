<?php

namespace Database\Seeders;

use App\Models\productos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto=new productos();
        $producto->codigo='COD01';
        $producto->nombre_producto='TORTA LA BABY';
        $producto->descripcion_producto='48/1';
        $producto->precio_venta='600.00';
        $producto->stock='20';
        $producto->imagen_url='-';
        $producto->save();

        $producto=new productos();
        $producto->codigo='COD02';
        $producto->nombre_producto='TORTA OCHO LOCOS';
        $producto->descripcion_producto='50/1';
        $producto->precio_venta='650.00';
        $producto->stock='20';
        $producto->imagen_url='-';
        $producto->save();

        $producto=new productos();
        $producto->codigo='COD3';
        $producto->nombre_producto='HAPPY NIGHT';
        $producto->descripcion_producto='48/1';
        $producto->precio_venta='500.00';
        $producto->stock='10';
        $producto->imagen_url='-';
        $producto->save();

        $producto=new productos();
        $producto->codigo='COD4';
        $producto->nombre_producto='TORTA DOÑA SISHE';
        $producto->descripcion_producto='36/1 DE 12 TIROS';
        $producto->precio_venta='700.00';
        $producto->stock='20';
        $producto->imagen_url='-';
        $producto->save();
    }
}
