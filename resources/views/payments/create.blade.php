@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Registrar nuevo pago</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="employee_id" class="form-label fw-bold">Empleado</label>
                    <select name="employee_id" id="employee_id" class="form-select" required>
                        <option value="">Seleccione un empleado</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="amount" class="form-label fw-bold">Monto (₡)</label>
                    <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" required>
                    @error('amount')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="payment_date" class="form-label fw-bold">Fecha de pago</label>
                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{ old('payment_date') }}" required>
                    @error('payment_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="method" class="form-label fw-bold">Método</label>
                    <select name="method" id="method" class="form-select" required>
                        <option value="">Seleccione método</option>
                        <option value="Efectivo" {{ old('method') == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                        <option value="Transferencia" {{ old('method') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                        <option value="Cheque" {{ old('method') == 'Cheque' ? 'selected' : '' }}>Cheque</option>
                    </select>
                    @error('method')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="reference" class="form-label fw-bold">Referencia</label>
                    <input type="text" name="reference" id="reference" class="form-control" value="{{ old('reference') }}">
                    @error('reference')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Guardar Pago
                </button>
                <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
