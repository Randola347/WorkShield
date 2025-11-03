<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Employee;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // 🧾 Mostrar lista de pagos
    public function index()
    {
        $payments = Payment::with('employee')->latest()->paginate(10);
        return view('payments.index', compact('payments'));
    }

    // ➕ Formulario para crear pago
    public function create()
    {
        $employees = Employee::orderBy('first_name')->get();
        return view('payments.create', compact('employees'));
    }

    // 💾 Guardar pago
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'amount' => 'required|numeric',
            'payment_date' => 'required|date',
            'method' => 'required|string',
            'reference' => 'nullable|string|max:50',
            'created_by' => 'nullable|integer',
        ]);

        Payment::create($validated);

        return redirect()->route('payments.index')->with('success', 'Pago registrado correctamente.');
    }

    // 👁️ Ver detalle
    public function show($id)
    {
        $payment = Payment::with('employee')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    // ✏️ Formulario editar
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $employees = Employee::orderBy('first_name')->get();
        return view('payments.edit', compact('payment', 'employees'));
    }

    // 💾 Actualizar
   public function update(Request $request, $id)
{
    $payment = Payment::findOrFail($id);

    $validated = $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'amount' => 'required|numeric',
        'payment_date' => 'required|date',
        'method' => 'required|string',
        'reference' => 'nullable|string|max:50',
        'created_by' => 'nullable|integer',
    ]);

    $payment->update($validated);

    return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente (UNSAFE).');
}

    // 🗑️ Eliminar
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pago eliminado correctamente.');
    }
}
