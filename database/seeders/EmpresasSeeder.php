<?php

namespace Database\Seeders;

use App\Models\empresas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresa=new empresas();
        $empresa->nombre_empresa='San sebastian';
        $empresa->ruc_empresa='12345678911';
        $empresa->telefono_empresa='986986986';
        $empresa->save();
    }
}
