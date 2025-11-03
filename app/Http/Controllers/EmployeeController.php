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
        // Validaciones mínimas para otros campos (puedes mantener las tuyas)
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:employees,email',
            'phone'      => 'nullable|string|max:30',
            'area'       => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'hire_date'  => 'nullable|date',
            'salary'     => 'nullable|numeric',
            'bank_account' => 'nullable|string|max:50',
            // notes marcado como nullable|string (no sanitizamos)
            'notes'      => 'nullable|string|max:2000',
        ], [
            'required' => 'El campo :attribute es obligatorio.',
            'email' => 'El :attribute debe ser un correo válido.',
            'numeric' => 'El campo :attribute debe ser numérico.',
            'unique' => 'El :attribute ya está en uso.',
        ]);

        // Vulnerable: guardamos notes tal cual (no strip_tags / no purify)
        $employee = Employee::create($validated);

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
    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:employees,email,' . $employee->id,
            'phone'      => 'nullable|string|max:30',
            'area'       => 'nullable|string|max:100',
            'position'   => 'nullable|string|max:100',
            'hire_date'  => 'nullable|date',
            'salary'     => 'nullable|numeric',
            'bank_account' => 'nullable|string|max:50',
            // notes no sanitizado
            'notes'      => 'nullable|string|max:2000',
        ]);

        // Vulnerable: actualizamos notes tal cual
        $employee->update($validated);

        return redirect()->route('employees.show', $employee)->with('success', 'Empleado actualizado correctamente.');
    }

    // 🗑️ Eliminar
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado correctamente.');
    }
}
