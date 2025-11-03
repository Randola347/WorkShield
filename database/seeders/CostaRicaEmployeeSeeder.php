<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Payment;

class CostaRicaEmployeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Limpiar datos existentes respetando foreign keys
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Payment::truncate();
        Employee::truncate();
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('🗑️  Datos existentes eliminados...');

        // Crear roles
        $this->seedRoles();
        $this->command->info('✅ Roles creados');

        // Crear empleados
        $this->seedEmployees();
        $this->command->info('✅ Empleados creados');

        // Crear pagos
        $this->seedPayments();
        $this->command->info('✅ Pagos creados');

        $this->command->info('🎉 Base de datos poblada exitosamente!');
    }

    private function seedRoles(): void
    {
        $roles = [
            ['name' => 'Administrador', 'description' => 'Acceso total al sistema, gestión completa'],
            ['name' => 'Gerente', 'description' => 'Gestiona empleados, pagos y reportes'],
            ['name' => 'Recursos Humanos', 'description' => 'Gestión de personal y nóminas'],
            ['name' => 'Supervisor', 'description' => 'Supervisa equipos de trabajo'],
            ['name' => 'Empleado', 'description' => 'Acceso limitado a información personal'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }

    private function seedEmployees(): void
    {
        $employees = [
            [
                'first_name' => 'Carlos',
                'last_name' => 'Ramírez',
                'email' => 'carlos.ramirez@workshield.cr',
                'phone' => '+506 88001122',
                'area' => 'Administración',
                'position' => 'Director General',
                'hire_date' => '2020-01-15',
                'salary' => 2500000.00,
                'bank_account' => 'CR120001001234567890123',
                'notes' => 'Director General de la empresa',
                'role_id' => 1
            ],
            [
                'first_name' => 'Ana',
                'last_name' => 'Jiménez',
                'email' => 'ana.jimenez@workshield.cr',
                'phone' => '+506 88002233',
                'area' => 'Recursos Humanos',
                'position' => 'Gerente de RRHH',
                'hire_date' => '2020-03-10',
                'salary' => 1800000.00,
                'bank_account' => 'CR120001002345678901234',
                'notes' => 'Gerente del departamento de RRHH',
                'role_id' => 2
            ],
            [
                'first_name' => 'Luis',
                'last_name' => 'Mora',
                'email' => 'luis.mora@workshield.cr',
                'phone' => '+506 88003344',
                'area' => 'Contabilidad',
                'position' => 'Contador Principal',
                'hire_date' => '2020-06-01',
                'salary' => 1600000.00,
                'bank_account' => 'CR120001003456789012345',
                'notes' => 'Contador certificado CPA',
                'role_id' => 3
            ],
            [
                'first_name' => 'Patricia',
                'last_name' => 'Solís',
                'email' => 'patricia.solis@workshield.cr',
                'phone' => '+506 88004455',
                'area' => 'TI',
                'position' => 'Jefa de Tecnología',
                'hire_date' => '2020-08-15',
                'salary' => 1900000.00,
                'bank_account' => 'CR120001004567890123456',
                'notes' => 'Líder del departamento de TI',
                'role_id' => 2
            ],
            [
                'first_name' => 'Roberto',
                'last_name' => 'Vargas',
                'email' => 'roberto.vargas@workshield.cr',
                'phone' => '+506 88005566',
                'area' => 'Ventas',
                'position' => 'Gerente de Ventas',
                'hire_date' => '2021-01-20',
                'salary' => 1700000.00,
                'bank_account' => 'CR120001005678901234567',
                'notes' => 'Gerente del equipo de ventas',
                'role_id' => 2
            ],
            [
                'first_name' => 'María',
                'last_name' => 'Hernández',
                'email' => 'maria.hernandez@workshield.cr',
                'phone' => '+506 88006677',
                'area' => 'Recursos Humanos',
                'position' => 'Analista de RRHH',
                'hire_date' => '2021-03-05',
                'salary' => 1200000.00,
                'bank_account' => 'CR120001006789012345678',
                'notes' => 'Especialista en reclutamiento',
                'role_id' => 3
            ],
            [
                'first_name' => 'Diego',
                'last_name' => 'Castro',
                'email' => 'diego.castro@workshield.cr',
                'phone' => '+506 88007788',
                'area' => 'TI',
                'position' => 'Desarrollador Senior',
                'hire_date' => '2021-05-10',
                'salary' => 1400000.00,
                'bank_account' => 'CR120001007890123456789',
                'notes' => 'Desarrollador Full Stack',
                'role_id' => 4
            ],
            [
                'first_name' => 'Laura',
                'last_name' => 'Pérez',
                'email' => 'laura.perez@workshield.cr',
                'phone' => '+506 88008899',
                'area' => 'Contabilidad',
                'position' => 'Asistente Contable',
                'hire_date' => '2021-07-01',
                'salary' => 950000.00,
                'bank_account' => 'CR120001008901234567890',
                'notes' => 'Asistente en contabilidad general',
                'role_id' => 5
            ],
            [
                'first_name' => 'Esteban',
                'last_name' => 'Rojas',
                'email' => 'esteban.rojas@workshield.cr',
                'phone' => '+506 88009900',
                'area' => 'Producción',
                'position' => 'Supervisor de Producción',
                'hire_date' => '2021-09-15',
                'salary' => 1300000.00,
                'bank_account' => 'CR120001009012345678901',
                'notes' => 'Supervisor de línea de producción',
                'role_id' => 4
            ],
            [
                'first_name' => 'Gabriela',
                'last_name' => 'Monge',
                'email' => 'gabriela.monge@workshield.cr',
                'phone' => '+506 88010011',
                'area' => 'Ventas',
                'position' => 'Ejecutiva de Ventas',
                'hire_date' => '2021-11-01',
                'salary' => 1100000.00,
                'bank_account' => 'CR120001010123456789012',
                'notes' => 'Ventas de productos corporativos',
                'role_id' => 5
            ],
            [
                'first_name' => 'Fernando',
                'last_name' => 'Arias',
                'email' => 'fernando.arias@workshield.cr',
                'phone' => '+506 88011122',
                'area' => 'TI',
                'position' => 'Desarrollador Junior',
                'hire_date' => '2022-01-10',
                'salary' => 900000.00,
                'bank_account' => 'CR120001011234567890123',
                'notes' => 'Desarrollador backend',
                'role_id' => 5
            ],
            [
                'first_name' => 'Silvia',
                'last_name' => 'Navarro',
                'email' => 'silvia.navarro@workshield.cr',
                'phone' => '+506 88012233',
                'area' => 'Atención al Cliente',
                'position' => 'Jefa de Servicio',
                'hire_date' => '2022-03-20',
                'salary' => 1250000.00,
                'bank_account' => 'CR120001012345678901234',
                'notes' => 'Líder del equipo de soporte',
                'role_id' => 4
            ],
            [
                'first_name' => 'Andrés',
                'last_name' => 'Villalobos',
                'email' => 'andres.villalobos@workshield.cr',
                'phone' => '+506 88013344',
                'area' => 'Producción',
                'position' => 'Operario de Producción',
                'hire_date' => '2022-05-15',
                'salary' => 750000.00,
                'bank_account' => 'CR120001013456789012345',
                'notes' => 'Operario en línea de ensamblaje',
                'role_id' => 5
            ],
            [
                'first_name' => 'Valeria',
                'last_name' => 'Quesada',
                'email' => 'valeria.quesada@workshield.cr',
                'phone' => '+506 88014455',
                'area' => 'Marketing',
                'position' => 'Gerente de Marketing',
                'hire_date' => '2022-07-01',
                'salary' => 1600000.00,
                'bank_account' => 'CR120001014567890123456',
                'notes' => 'Estrategias de marketing digital',
                'role_id' => 2
            ],
            [
                'first_name' => 'Jorge',
                'last_name' => 'Brenes',
                'email' => 'jorge.brenes@workshield.cr',
                'phone' => '+506 88015566',
                'area' => 'Logística',
                'position' => 'Coordinador Logístico',
                'hire_date' => '2022-09-10',
                'salary' => 1150000.00,
                'bank_account' => 'CR120001015678901234567',
                'notes' => 'Coordinación de envíos y distribución',
                'role_id' => 4
            ],
            [
                'first_name' => 'Daniela',
                'last_name' => 'Murillo',
                'email' => 'daniela.murillo@workshield.cr',
                'phone' => '+506 88016677',
                'area' => 'Atención al Cliente',
                'position' => 'Agente de Soporte',
                'hire_date' => '2023-01-15',
                'salary' => 850000.00,
                'bank_account' => 'CR120001016789012345678',
                'notes' => 'Soporte técnico al cliente',
                'role_id' => 5
            ],
            [
                'first_name' => 'Pablo',
                'last_name' => 'Chacón',
                'email' => 'pablo.chacon@workshield.cr',
                'phone' => '+506 88017788',
                'area' => 'TI',
                'position' => 'Analista de Sistemas',
                'hire_date' => '2023-03-20',
                'salary' => 1300000.00,
                'bank_account' => 'CR120001017890123456789',
                'notes' => 'Análisis y diseño de sistemas',
                'role_id' => 4
            ],
            [
                'first_name' => 'Carolina',
                'last_name' => 'Fonseca',
                'email' => 'carolina.fonseca@workshield.cr',
                'phone' => '+506 88018899',
                'area' => 'Recursos Humanos',
                'position' => 'Coordinadora de Capacitación',
                'hire_date' => '2023-05-10',
                'salary' => 1100000.00,
                'bank_account' => 'CR120001018901234567890',
                'notes' => 'Programas de desarrollo profesional',
                'role_id' => 3
            ],
            [
                'first_name' => 'Mauricio',
                'last_name' => 'Loría',
                'email' => 'mauricio.loria@workshield.cr',
                'phone' => '+506 88019900',
                'area' => 'Ventas',
                'position' => 'Ejecutivo de Ventas',
                'hire_date' => '2023-07-01',
                'salary' => 1050000.00,
                'bank_account' => 'CR120001019012345678901',
                'notes' => 'Ventas B2B',
                'role_id' => 5
            ],
            [
                'first_name' => 'Tatiana',
                'last_name' => 'Esquivel',
                'email' => 'tatiana.esquivel@workshield.cr',
                'phone' => '+506 88020011',
                'area' => 'Marketing',
                'position' => 'Especialista en Redes Sociales',
                'hire_date' => '2023-09-15',
                'salary' => 950000.00,
                'bank_account' => 'CR120001020123456789012',
                'notes' => 'Gestión de redes sociales corporativas',
                'role_id' => 5
            ],
            [
                'first_name' => 'Ricardo',
                'last_name' => 'Zamora',
                'email' => 'ricardo.zamora@workshield.cr',
                'phone' => '+506 88021122',
                'area' => 'Producción',
                'position' => 'Técnico de Mantenimiento',
                'hire_date' => '2024-01-10',
                'salary' => 900000.00,
                'bank_account' => 'CR120001021234567890123',
                'notes' => 'Mantenimiento preventivo y correctivo',
                'role_id' => 5
            ],
            [
                'first_name' => 'Melissa',
                'last_name' => 'Cordero',
                'email' => 'melissa.cordero@workshield.cr',
                'phone' => '+506 88022233',
                'area' => 'Contabilidad',
                'position' => 'Analista Financiero',
                'hire_date' => '2024-03-05',
                'salary' => 1350000.00,
                'bank_account' => 'CR120001022345678901234',
                'notes' => 'Análisis financiero y presupuestos',
                'role_id' => 3
            ],
            [
                'first_name' => 'Alejandro',
                'last_name' => 'Salas',
                'email' => 'alejandro.salas@workshield.cr',
                'phone' => '+506 88023344',
                'area' => 'Logística',
                'position' => 'Asistente de Bodega',
                'hire_date' => '2024-05-20',
                'salary' => 800000.00,
                'bank_account' => 'CR120001023456789012345',
                'notes' => 'Control de inventarios',
                'role_id' => 5
            ],
            [
                'first_name' => 'Karina',
                'last_name' => 'Madrigal',
                'email' => 'karina.madrigal@workshield.cr',
                'phone' => '+506 88024455',
                'area' => 'Atención al Cliente',
                'position' => 'Agente de Soporte',
                'hire_date' => '2024-07-15',
                'salary' => 850000.00,
                'bank_account' => 'CR120001024567890123456',
                'notes' => 'Atención telefónica y por chat',
                'role_id' => 5
            ],
            [
                'first_name' => 'Oscar',
                'last_name' => 'Vega',
                'email' => 'oscar.vega@workshield.cr',
                'phone' => '+506 88025566',
                'area' => 'TI',
                'position' => 'Ingeniero DevOps',
                'hire_date' => '2024-09-01',
                'salary' => 1500000.00,
                'bank_account' => 'CR120001025678901234567',
                'notes' => 'Infraestructura y despliegue continuo',
                'role_id' => 4
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }

    private function seedPayments(): void
    {
        $payments = [
            // Pagos Octubre 2024
            ['employee_id' => 1, 'amount' => 2500000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-001', 'created_by' => 1],
            ['employee_id' => 2, 'amount' => 1800000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-002', 'created_by' => 1],
            ['employee_id' => 3, 'amount' => 1600000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-003', 'created_by' => 1],
            ['employee_id' => 4, 'amount' => 1900000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-004', 'created_by' => 1],
            ['employee_id' => 5, 'amount' => 1700000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-005', 'created_by' => 1],
            ['employee_id' => 6, 'amount' => 1200000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-006', 'created_by' => 1],
            ['employee_id' => 7, 'amount' => 1400000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-007', 'created_by' => 1],
            ['employee_id' => 8, 'amount' => 950000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-008', 'created_by' => 1],
            ['employee_id' => 9, 'amount' => 1300000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-009', 'created_by' => 1],
            ['employee_id' => 10, 'amount' => 1100000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-010', 'created_by' => 1],
            ['employee_id' => 11, 'amount' => 900000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-011', 'created_by' => 1],
            ['employee_id' => 12, 'amount' => 1250000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-012', 'created_by' => 1],
            ['employee_id' => 13, 'amount' => 750000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-013', 'created_by' => 1],
            ['employee_id' => 14, 'amount' => 1600000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-014', 'created_by' => 1],
            ['employee_id' => 15, 'amount' => 1150000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-015', 'created_by' => 1],
            ['employee_id' => 16, 'amount' => 850000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-016', 'created_by' => 1],
            ['employee_id' => 17, 'amount' => 1300000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-017', 'created_by' => 1],
            ['employee_id' => 18, 'amount' => 1100000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-018', 'created_by' => 1],
            ['employee_id' => 19, 'amount' => 1050000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-019', 'created_by' => 1],
            ['employee_id' => 20, 'amount' => 950000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-020', 'created_by' => 1],
            ['employee_id' => 21, 'amount' => 900000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-021', 'created_by' => 1],
            ['employee_id' => 22, 'amount' => 1350000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-022', 'created_by' => 1],
            ['employee_id' => 23, 'amount' => 800000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-023', 'created_by' => 1],
            ['employee_id' => 24, 'amount' => 850000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-024', 'created_by' => 1],
            ['employee_id' => 25, 'amount' => 1500000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-10-025', 'created_by' => 1],

            // Pagos Septiembre 2024
            ['employee_id' => 1, 'amount' => 2500000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-001', 'created_by' => 1],
            ['employee_id' => 2, 'amount' => 1800000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-002', 'created_by' => 1],
            ['employee_id' => 3, 'amount' => 1600000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-003', 'created_by' => 1],
            ['employee_id' => 4, 'amount' => 1900000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-004', 'created_by' => 1],
            ['employee_id' => 5, 'amount' => 1700000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-005', 'created_by' => 1],
            ['employee_id' => 6, 'amount' => 1200000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-006', 'created_by' => 1],
            ['employee_id' => 7, 'amount' => 1400000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-007', 'created_by' => 1],
            ['employee_id' => 8, 'amount' => 950000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-008', 'created_by' => 1],
            ['employee_id' => 9, 'amount' => 1300000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-009', 'created_by' => 1],
            ['employee_id' => 10, 'amount' => 1100000.00, 'payment_date' => '2024-09-30', 'method' => 'Transferencia Bancaria', 'reference' => 'PAY-2024-09-010', 'created_by' => 1],

            // Bonos Aguinaldo 2024
            ['employee_id' => 1, 'amount' => 208333.33, 'payment_date' => '2024-12-01', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-AGU-2024-001', 'created_by' => 1],
            ['employee_id' => 2, 'amount' => 150000.00, 'payment_date' => '2024-12-01', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-AGU-2024-002', 'created_by' => 1],
            ['employee_id' => 3, 'amount' => 133333.33, 'payment_date' => '2024-12-01', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-AGU-2024-003', 'created_by' => 1],
            ['employee_id' => 4, 'amount' => 158333.33, 'payment_date' => '2024-12-01', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-AGU-2024-004', 'created_by' => 1],
            ['employee_id' => 5, 'amount' => 141666.67, 'payment_date' => '2024-12-01', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-AGU-2024-005', 'created_by' => 1],

            // Adelantos de salario
            ['employee_id' => 11, 'amount' => 450000.00, 'payment_date' => '2024-10-15', 'method' => 'Efectivo', 'reference' => 'ADL-2024-10-001', 'created_by' => 1],
            ['employee_id' => 13, 'amount' => 375000.00, 'payment_date' => '2024-10-15', 'method' => 'Efectivo', 'reference' => 'ADL-2024-10-002', 'created_by' => 1],
            ['employee_id' => 16, 'amount' => 425000.00, 'payment_date' => '2024-10-15', 'method' => 'Transferencia Bancaria', 'reference' => 'ADL-2024-10-003', 'created_by' => 1],

            // Horas extra
            ['employee_id' => 9, 'amount' => 150000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'HEX-2024-10-001', 'created_by' => 1],
            ['employee_id' => 13, 'amount' => 85000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'HEX-2024-10-002', 'created_by' => 1],
            ['employee_id' => 21, 'amount' => 95000.00, 'payment_date' => '2024-10-31', 'method' => 'Transferencia Bancaria', 'reference' => 'HEX-2024-10-003', 'created_by' => 1],

            // Bonos por desempeño
            ['employee_id' => 5, 'amount' => 250000.00, 'payment_date' => '2024-10-15', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-DES-2024-10-001', 'created_by' => 1],
            ['employee_id' => 10, 'amount' => 150000.00, 'payment_date' => '2024-10-15', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-DES-2024-10-002', 'created_by' => 1],
            ['employee_id' => 14, 'amount' => 200000.00, 'payment_date' => '2024-10-15', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-DES-2024-10-003', 'created_by' => 1],
            ['employee_id' => 19, 'amount' => 125000.00, 'payment_date' => '2024-10-15', 'method' => 'Transferencia Bancaria', 'reference' => 'BON-DES-2024-10-004', 'created_by' => 1],
        ];

        foreach ($payments as $payment) {
            Payment::create($payment);
        }
    }
}
