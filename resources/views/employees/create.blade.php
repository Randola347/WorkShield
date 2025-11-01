@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Registrar nuevo empleado</h5>
            <a href="{{ route('employees.index') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>

        <div class="card-body">
            <!-- Mostrar errores generales -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Corrija los siguientes errores:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.store') }}" method="POST" class="row g-3 needs-validation" novalidate>
                @csrf

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                    @error('first_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellidos</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                    @error('last_name') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                    @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required pattern="[0-9+\s]+" maxlength="20">
                    @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Área</label>
                    <input type="text" name="area" value="{{ old('area') }}" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                    @error('area') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Puesto</label>
                    <input type="text" name="position" value="{{ old('position') }}" class="form-control" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+">
                    @error('position') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de contratación</label>
                    <input type="date" name="hire_date" value="{{ old('hire_date') }}" class="form-control" required>
                    @error('hire_date') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Salario (₡)</label>
                    <input type="text" name="salary" id="salary_display" value="{{ old('salary') }}" class="form-control" required inputmode="decimal" autocomplete="off">
                    @error('salary') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Cuenta bancaria (IBAN)</label>
                    <input type="text" name="bank_account" value="{{ old('bank_account') }}" class="form-control" required pattern="[A-Za-z0-9]+" minlength="10">
                    @error('bank_account') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Notas (opcional)</label>
                    <textarea name="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
                </div>

                <div class="col-12 mt-4 d-flex flex-wrap gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Guardar
                    </button>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('salary_display');
    input.addEventListener('input', e => {
        e.target.value = e.target.value.replace(/[^\d.]/g, '');
    });
    input.addEventListener('blur', e => {
        const raw = e.target.value.replace(/[^\d.]/g, '');
        if (!raw) return;
        const num = parseFloat(raw);
        if (!isNaN(num)) {
            e.target.value = '₡' + num.toLocaleString('es-CR', { minimumFractionDigits: 2 });
        }
    });
    input.addEventListener('focus', e => e.target.value = e.target.value.replace(/[₡,]/g, ''));
});
</script>

<style>
main, .container-fluid {
    margin-left: 260px;
    max-width: calc(100% - 260px);
}
@media (max-width: 992px) {
    main, .container-fluid {
        margin-left: 0;
        max-width: 100%;
    }
}
</style>
@endsection
