@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Detalles del pago</h2>

    <div class="card p-4 shadow-sm">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-bold">Empleado:</label>
                <div class="form-control bg-light">{{ $payment->employee->full_name }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Monto:</label>
                <div class="form-control bg-light">₡{{ number_format($payment->amount, 2) }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de pago:</label>
                <div class="form-control bg-light">{{ $payment->payment_date }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Método:</label>
                <div class="form-control bg-light">{{ $payment->method }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Referencia:</label>
                <div class="form-control bg-light">{{ $payment->reference ?? '-' }}</div>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('payments.edit', $payment) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
