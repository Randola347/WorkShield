<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaymentsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 25; $i++) {
            DB::table('payments')->insert([
                'employee_id' => rand(1, 15),
                'amount' => $faker->randomFloat(2, 400000, 2000000),
                'payment_date' => $faker->date(),
                'method' => $faker->randomElement(['Transferencia', 'Efectivo']),
                'reference' => strtoupper($faker->bothify('REF###??')),
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
