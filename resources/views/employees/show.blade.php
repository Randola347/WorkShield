@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Detalles del Empleado</h2>

    <div class="card p-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-bold">Nombre:</label>
                <div class="form-control bg-light">{{ $employee->full_name }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Correo:</label>
                <div class="form-control bg-light">{{ $employee->email }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Teléfono:</label>
                <div class="form-control bg-light">{{ $employee->phone ?? '-' }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Área:</label>
                <div class="form-control bg-light">{{ $employee->area ?? '-' }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Puesto:</label>
                <div class="form-control bg-light">{{ $employee->position ?? '-' }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de Contratación:</label>
                <div class="form-control bg-light">{{ $employee->hire_date ?? '-' }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Salario:</label>
                <div class="form-control bg-light">₡{{ number_format($employee->salary ?? 0, 2) }}</div>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Notas:</label>
                <div class="form-control bg-light">{!! $employee->notes ?? 'Sin notas' !!}</div>
            </div>
        </div>

        <div class="mt-4 d-flex flex-wrap gap-2">
            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
