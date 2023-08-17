<?php

namespace Database\Seeders;

use App\Models\tipo_pago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo=new tipo_pago();
        $tipo->nombre_tipo='credito';
        $tipo->save();

        $tipo=new tipo_pago();
        $tipo->nombre_tipo='pago';
        $tipo->save();
    }
}
