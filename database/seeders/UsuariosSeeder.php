<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'id_user' => 1,
                'nombre_completo' => 'Ana Garcia',
                'username' => 'admin_ana',
                'password' => Hash::make('12345'),
                'role_id' => 1,
                'fecha_registro' => '2024-01-10'
            ],
            [
                'id_user' => 2,
                'nombre_completo' => 'Luis Perez',
                'username' => 'oper_luis',
                'password' => Hash::make('12345'),
                'role_id' => 2,
                'fecha_registro' => '2024-01-15'
            ],
            [
                'id_user' => 3,
                'nombre_completo' => 'Maria Lopez',
                'username' => 'admin_maria',
                'password' => Hash::make('12345'),
                'role_id' => 1,
                'fecha_registro' => '2024-02-01'
            ]
        ]);
    }
}
                