<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // 📋 Listar empleados
    public function index()
    {
        $employees = Employee::select(
            'id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'area',
            'position',
            'salary'
        )->orderBy('id', 'desc')->paginate(10);

        return view('employees.index', compact('employees'));
    }

    // 🟢 Formulario de creación
    public function create()
    {
        return view('employees.create');
    }

    // 💾 Guardar nuevo empleado
    public function store(Request $request)
    {
        $request->merge([
            'salary' => preg_replace('/[^\d.]/', '', $request->salary),
        ]);

        $attributes = [
            'first_name'    => 'nombre',
            'last_name'     => 'apellidos',
            'email'         => 'correo electrónico',
            'phone'         => 'teléfono',
            'area'          => 'área',
            'position'      => 'puesto',
            'hire_date'     => 'fecha de contratación',
            'salary'        => 'salario',
            'bank_account'  => 'cuenta bancaria',
            'notes'         => 'notas',
        ];

        $validated = $request->validate([
            'first_name'    => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'last_name'     => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'email'         => 'required|email|unique:employees,email',
            'phone'         => 'required|regex:/^[0-9+\s]+$/',
            'area'          => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'position'      => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'hire_date'     => 'required|date',
            'salary' => 'required|numeric|min:0|max:99999999.99',
            'bank_account'  => 'required|regex:/^[A-Za-z0-9]+$/|min:10',
            'notes'         => 'nullable|string',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute no es válido.',
            'regex' => 'El campo :attribute contiene caracteres no válidos.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'unique' => 'El :attribute ya está registrado.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ], $attributes);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Empleado registrado correctamente.');
    }

    // 👁️ Ver detalle del empleado
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    // ✏️ Formulario de edición
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // 💾 Actualizar
    public function update(Request $request, Employee $employee)
    {
        $request->merge([
            'salary' => preg_replace('/[^\d.]/', '', $request->salary),
        ]);

        $attributes = [
            'first_name'    => 'nombre',
            'last_name'     => 'apellidos',
            'email'         => 'correo electrónico',
            'phone'         => 'teléfono',
            'area'          => 'área',
            'position'      => 'puesto',
            'hire_date'     => 'fecha de contratación',
            'salary'        => 'salario',
            'bank_account'  => 'cuenta bancaria',
            'notes'         => 'notas',
        ];

        $validated = $request->validate([
            'first_name'    => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'last_name'     => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'email'         => 'required|email|unique:employees,email,' . $employee->id,
            'phone'         => 'required|regex:/^[0-9+\s]+$/',
            'area'          => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'position'      => 'required|regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',
            'hire_date'     => 'required|date',
            'salary' => 'required|numeric|min:0|max:99999999.99',

            'bank_account'  => 'required|regex:/^[A-Za-z0-9]+$/|min:10',
            'notes'         => 'nullable|string',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El campo :attribute no es válido.',
            'regex' => 'El campo :attribute contiene caracteres no válidos.',
            'numeric' => 'El campo :attribute debe ser un número.',
            'min' => 'El campo :attribute debe tener al menos :min caracteres.',
            'unique' => 'El :attribute ya está registrado.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ], $attributes);

        $employee->update($validated);

        return redirect()->route('employees.index')->with('success', 'Empleado actualizado correctamente.');
    }

    // 🗑️ Eliminar
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente.');
    }

}
