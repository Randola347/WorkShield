# WorkShield 
**Proyecto:** WorkShield (404 Bros Found)  
**Curso:** ITI-922 — Seguridad de TI II  
**Integrante:** Randall Madrigal Pérez y Cristopher Matus Salas

---

## 1. Descripción del proyecto

### Propósito de la aplicación
WorkShield es una aplicación web desarrollada para prácticas de seguridad informática y gestión de RRHH. Permite gestionar empleados (crear, listar, ver detalle, editar, eliminar). El objetivo de este repositorio es servir como **proyecto de prueba** para implementar, explotar y documentar vulnerabilidades OWASP con fines educativos.

### Tecnologías utilizadas
- **Framework:** Laravel 11 (PHP 8.4)  
- **Frontend:** Blade templates + Bootstrap 5 (responsive) + JavaScript  
- **Base de datos:** MySQL 8  
- **Servidor de desarrollo:** php artisan serve (http://127.0.0.1:8000)  

### Arquitectura general
Aplicación MVC (Models, Views, Controllers) típica de Laravel:
- `app/Models` → Modelos Eloquent (Employee, Role, Payment, Audit, User).  
- `app/Http/Controllers` → Lógica CRUD y endpoints.  
- `resources/views` → Vistas Blade (UI en español).  
- `database/migrations` y `database/seeders` → Estructura y datos iniciales.

---

## 2. Instrucciones de despliegue

### Requisitos previos
- PHP >= 8.4  
- Composer >= 2.0 
- MySQL >= 8.0   
- Git

### Pasos detallados de instalación
1. Clonar el repositorio:
   ```bash
   git clone https://github.com/Randola347/WorkShield.git
   cd workshield
````

2. Instalar dependencias PHP:

   ```bash
   composer install
   ```
3. Copiar el archivo de entorno y generar key:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configurar `.env` con los datos de la base de datos:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=workshield
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Ejecutar migraciones y seeders (opcional: use el seeder de laboratorio si existe):

   ```bash
   php artisan migrate
   php artisan db:seed --class=CostaRicaEmployeeSeeder
   ```
6. Iniciar servidor local:

   ```bash
   php artisan serve
   ```

   Abre: `http://127.0.0.1:8000`

### Configuración de base de datos

* Las migraciones crean las tablas principales: `users`, `employees`, `roles`, `payments`, `audits`.

---

## 3. Catálogo de vulnerabilidades

### Vulnerabilidad 1 — IDOR (Insecure Direct Object Reference)

* **Nombre:** IDOR (Insecure Direct Object Reference)
* **Clasificación OWASP:** A01:2021 — Broken Access Control

#### i. Descripción técnica

Se añadió un endpoint público que devuelve la vista de detalles de un empleado sin aplicar autenticación ni verificación de permisos. Cualquiera que conozca o pruebe diferentes valores del parámetro `{id}` puede enumerar y visualizar registros de empleados (incluyendo datos sensibles como salario y cuenta bancaria). Esto constituye **Broken Access Control** porque el acceso a recursos no está restringido por ownership o roles.

#### ii. Ubicación en el código

* **Ruta vulnerable:** `routes/web.php`
  * Archivo: `routes/web.php`
  * Linea 40: Route::get('/public/employees/{id}', [EmployeeController::class, 'publicShow']);
* **Controlador:** `app/Http/Controllers/EmployeeController.php`

  * Método: `publicShow($id)`
  * Fragmento relevante (aprox. ubicación dentro del archivo):

    ```php
    public function publicShow($id)
{
    $employee = \App\Models\Employee::findOrFail($id);

    return view('employees.show', compact('employee'));
}

    ```
  
#### Pasos detallados para explotar la vulnerabilidad

**Precondición:** servidor en ejecución en `http://127.0.0.1:8000`.

1. Abre el navegador (o usa `curl`).
2. Abrir la URL del endpoint con un id válido:

   ```
   http://127.0.0.1:8000/public/employees/6
   ```
3. Si la página muestra la ficha del empleado sin pedir login → vulnerabilidad reproducida.
4. Cambia el `{id}` por otros valores para enumerar registros:

   ```
   http://127.0.0.1:8000/public/employees/2
   http://127.0.0.1:8000/public/employees/3
   ```


#### iv. Evidencia (qué capturar)

* Captura de pantalla de `/public/employees/6` mostrando campos: nombre, correo, teléfono, salario, cuenta bancaria, notas.
![IDOR](./images/captura1.png)

#### v. Impacto

* Exposición de datos personales y financieros de empleados.
* Posibilidad de enumerar registros y extraer información confidencial.
* Base para ataques posteriores (ingeniería social, fraudes, etc.).

---

## 4. Contribuciones del equipo

### Distribución de tareas

* **Randall Madrigal Pérez** — 
* **Cristhofer Matus Salas** — 
### Estadísticas de commits por integrante

* Randall Madrigal Pérez —
* Cristhofer Matus Salas — 
---