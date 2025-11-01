@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Editar pago</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('payments.update', $payment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="employee_id" class="form-label fw-bold">Empleado</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $employee->id == $payment->employee_id ? 'selected' : '' }}>
                                {{ $employee->full_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="amount" class="form-label fw-bold">Monto (₡)</label>
                    <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}" required>
                </div>

                <div class="col-md-6">
                    <label for="payment_date" class="form-label fw-bold">Fecha de pago</label>
                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ $payment->payment_date }}" required>
                </div>

                <div class="col-md-6">
                    <label for="method" class="form-label fw-bold">Método</label>
                    <select name="method" id="method" class="form-select" required>
                        <option value="Efectivo" {{ $payment->method == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                        <option value="Transferencia" {{ $payment->method == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                        <option value="Cheque" {{ $payment->method == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="reference" class="form-label fw-bold">Referencia</label>
                    <input type="text" name="reference" id="reference" class="form-control" value="{{ $payment->reference }}">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Actualizar Pago
                </button>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
