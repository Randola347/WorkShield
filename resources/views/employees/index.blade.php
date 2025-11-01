@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
        <h2 class="mb-2 mb-md-0">Gestión de Empleados</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nuevo Empleado
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Puesto</th>
                        <th>Salario</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $employee->full_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone ?? '-' }}</td>
                            <td>{{ $employee->area ?? '-' }}</td>
                            <td>{{ $employee->position ?? '-' }}</td>
                            <td>₡{{ number_format($employee->salary ?? 0, 2) }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-info text-white">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning text-white">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                          onsubmit="return confirm('¿Eliminar este empleado?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay empleados registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $employees->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
