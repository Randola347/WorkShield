@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editar empleado</h5>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('employees.update', $employee) }}" method="POST" class="row g-3" id="employeeForm" novalidate>
                @csrf @method('PUT')

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="first_name" value="{{ $employee->first_name }}" class="form-control" required
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo letras y espacios">
                    <div class="invalid-feedback">Ingrese un nombre válido (solo letras).</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="last_name" value="{{ $employee->last_name }}" class="form-control" required
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo letras y espacios">
                    <div class="invalid-feedback">Ingrese apellidos válidos (solo letras).</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" value="{{ $employee->email }}" class="form-control" required>
                    <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control" required
                        pattern="[0-9+\s]+" maxlength="20" title="Solo números y el signo +">
                    <div class="invalid-feedback">Ingrese un número de teléfono válido.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Área</label>
                    <input type="text" name="area" value="{{ $employee->area }}" class="form-control" required
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo letras y espacios">
                    <div class="invalid-feedback">Ingrese un área válida (solo letras).</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Puesto</label>
                    <input type="text" name="position" value="{{ $employee->position }}" class="form-control" required
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" title="Solo letras y espacios">
                    <div class="invalid-feedback">Ingrese un puesto válido (solo letras).</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de contratación</label>
                    <input type="date" name="hire_date" value="{{ $employee->hire_date }}" class="form-control" required>
                    <div class="invalid-feedback">Seleccione una fecha válida.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Salario</label>
                    <div class="input-group">
                        <span class="input-group-text">₡</span>
                        <input type="text" id="salary_display" value="{{ number_format($employee->salary, 2, '.', '') }}" class="form-control" required inputmode="decimal">
                        <input type="hidden" name="salary" id="salary_real" value="{{ $employee->salary }}">
                    </div>
                    <div class="invalid-feedback">Ingrese un salario válido.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Cuenta bancaria (IBAN)</label>
                    <input type="text" name="bank_account" value="{{ $employee->bank_account }}" class="form-control" required
                        pattern="[A-Za-z0-9]+" minlength="10" title="Solo letras y números (sin espacios)">
                    <div class="invalid-feedback">Ingrese una cuenta bancaria válida.</div>
                </div>

                <div class="col-12">
                    <label class="form-label">Notas (opcional)</label>
                    <textarea name="notes" class="form-control" rows="3">{{ $employee->notes }}</textarea>
                </div>

                <div class="col-12 mt-4 d-flex flex-wrap gap-2">
                    <button class="btn btn-warning text-white"><i class="bi bi-pencil-square"></i> Actualizar</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const display = document.getElementById('salary_display');
    const real = document.getElementById('salary_real');
    const form = document.getElementById('employeeForm');

    display.addEventListener('input', function() {
        const cleaned = display.value.replace(/[^\d.]/g, '');
        display.value = cleaned;
        real.value = cleaned;
    });

    display.addEventListener('blur', function() {
        const raw = real.value.replace(/[^\d.]/g, '');
        if (raw.trim() === '') {
            display.value = '';
            real.value = '';
            return;
        }
        const num = parseFloat(raw);
        if (!isNaN(num)) {
            display.value = num.toLocaleString('es-CR', {
                style: 'currency',
                currency: 'CRC',
                minimumFractionDigits: 2
            }).replace('CRC', '₡').replace(/\s/g, '');
            real.value = num.toFixed(2);
        }
    });

    display.addEventListener('focus', function() {
        if (display.value.includes('₡')) display.value = real.value;
    });

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection
