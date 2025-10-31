<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 15; $i++) {
            DB::table('employees')->insert([
                'first_name' => $faker->firstName,
                'last_name'  => $faker->lastName,
                'email'      => $faker->unique()->safeEmail,
                'phone'      => $faker->phoneNumber,
                'area'       => $faker->randomElement(['Finanzas', 'RRHH', 'TI', 'Ventas']),
                'position'   => $faker->jobTitle,
                'hire_date'  => $faker->date(),
                'salary'     => $faker->randomFloat(2, 400000, 2000000),
                'bank_account' => $faker->iban('CR'),
                'notes'      => $faker->sentence(),
                'role_id'    => rand(1, 4),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
