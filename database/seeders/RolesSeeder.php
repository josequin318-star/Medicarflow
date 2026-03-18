<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'role_id' => 1,
                'nombre_rol' => 'Administrador'
            ],
            [
                'role_id' => 2,
                'nombre_rol' => 'Operativo'
            ]
        ]);
    }
}
