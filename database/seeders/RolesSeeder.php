<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Acceso total al sistema'],
            ['name' => 'Manager', 'description' => 'Gestiona empleados y pagos'],
            ['name' => 'HR', 'description' => 'Recursos humanos, nóminas'],
            ['name' => 'Employee', 'description' => 'Acceso limitado a su propio perfil']
        ]);
    }
}
