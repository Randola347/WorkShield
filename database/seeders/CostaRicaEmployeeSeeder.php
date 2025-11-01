<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Str;

class CostaRicaEmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $nombres = [
            ['Juan', 'Pérez'], ['María', 'Fernández'], ['Carlos', 'Soto'], ['Laura', 'Jiménez'],
            ['José', 'Rodríguez'], ['Sofía', 'Vargas'], ['Daniel', 'Castro'], ['Gabriela', 'Morales'],
            ['Andrés', 'Madrigal'], ['Paola', 'Alvarado'], ['Randall', 'Madrigal'], ['Cristhofer', 'Matus'],
            ['Michael', 'Barrantes'], ['Carlos', 'Bravo'], ['Luis', 'Villalobos'], ['Ana', 'Salazar']
        ];

        $puestos = [
            'Gerente General', 'Contador', 'Asistente Administrativo', 'Repartidor',
            'Soporte Técnico', 'Desarrollador Web', 'Encargado de Inventario', 'Secretaria',
            'Analista Financiero', 'Operario de Producción', 'Jefe de Ventas'
        ];

        $areas = [
            'Recursos Humanos', 'Finanzas', 'Ventas', 'Producción',
            'TI', 'Contabilidad', 'Mantenimiento', 'Atención al Cliente'
        ];

        $bancos = [
            'Banco Nacional de Costa Rica',
            'BAC Credomatic',
            'Banco de Costa Rica',
            'Davivienda',
            'Coopenae',
            'Mutual Alajuela'
        ];

        $telefonosKolbi = ['83', '84', '85', '86'];
        $telefonosClaro = ['70', '71', '72'];
        $telefonosLiberty = ['60', '61', '62'];

        $empleados = Employee::all();

        foreach ($empleados as $employee) {
            // Nombre aleatorio
            $nombre = $nombres[array_rand($nombres)];
            $employee->first_name = $nombre[0];
            $employee->last_name = $nombre[1];

            // Área y puesto en español
            $employee->area = $areas[array_rand($areas)];
            $employee->position = $puestos[array_rand($puestos)];

            // Teléfono realista (aleatorio entre operadoras)
            $prefixGroup = [ $telefonosKolbi, $telefonosClaro, $telefonosLiberty ][rand(0,2)];
            $prefix = $prefixGroup[array_rand($prefixGroup)];
            $number = $prefix . rand(1000000, 9999999);
            $employee->phone = '+506 ' . $number;

            // Salario aleatorio entre ₡350,000 y ₡1,200,000
            $employee->salary = rand(350000, 1200000);

            // Banco y cuenta ficticia IBAN CR + 18 dígitos
            $bank = $bancos[array_rand($bancos)];
            $iban = 'CR' . rand(10, 99) . '0' . str_pad(rand(1000000000000000, 9999999999999999), 18, '0', STR_PAD_LEFT);
            $employee->bank_account = $iban;

            // Correo genérico realista
            $employee->email = strtolower($employee->first_name . '.' . $employee->last_name . rand(1,99)) . '@workshield.cr';

            // Fecha de contratación en últimos 5 años
            $employee->hire_date = now()->subDays(rand(30, 1800));

            // Nota general
            $employee->notes = "Empleado activo en Costa Rica. Banco: $bank";

            $employee->save();
        }

        $this->command->info('✅ Todos los empleados fueron actualizados con datos ficticios de Costa Rica.');
    }
}
