<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario=new User();
        $usuario->name='Administrador del Sistema';
        $usuario->email='admin';
        $usuario->password=Hash::make('admin123');
        $usuario->save();
    }
}
