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
- Xampp 8.2.12 / PHP 8.2.12
### Pasos detallados de instalación
1. Tener la terminal en:
   ```bash
   \WorkShield>
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
5. Importar base de datos:
   En Xampp tener corriendo Apache y MySQL, entrar en admin de MySQL e importar la bd llamada workshield_db.sql que se encuentra en la carpeta del proyecto.
6. Ejecutar migraciones:

   ```bash
   php artisan migrate
   ```
7. Iniciar servidor local:

   ```bash
   php artisan serve
   ```

   Abre: `http://127.0.0.1:8000`

### Configuración de base de datos
---

## 3. Catálogo de vulnerabilidades

### Vulnerabilidad 1 — IDOR (Insecure Direct Object Reference)

* **Nombre:** IDOR (Insecure Direct Object Reference)
* **Clasificación OWASP:** A01:2021 — Broken Access Control

#### i. Descripción técnica

Cada modulo tiene su funcionabilidad CRUD que devuelve la vista de detalles de un empleado, pagos o roles no aplicado autenticación ni verificación de permisos. Cualquiera que conozca o pruebe diferentes valores del parámetro `{id}` puede enumerar y visualizar registros de empleados etc (incluyendo datos sensibles como salario y cuenta bancaria). Esto esta dentro de  **Broken Access Control** porque el acceso a recursos no está restringido por el login o roles.

#### ii. Ubicación en el código

* **Ruta vulnerable:** `routes/web.php`
  * Archivo: `routes/web.php`
  * Linea 37: Route::resource('employees', EmployeeController::class);
* **Controlador:** `app/Http/Controllers/EmployeeController.php`

  * Método: `show($id)`
  * Fragmento codigo linea 80:

    ```php
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }
    ```
  
#### Pasos detallados para explotar la vulnerabilidad

**Precondición:** servidor en ejecución en `http://127.0.0.1:8000` y base de datos importada.

1. Abrir el navegador.
2. Abrir la URL del endpoint con un id válido:

   ```
   http://127.0.0.1:8000/employees/6
   ```
3. Cambiar el `{id}` por otros valores para enumerar registros:

   ```
   http://127.0.0.1:8000/employees/2
   http://127.0.0.1:8000/employees/3
   ```


#### IMG. Evidencia
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
