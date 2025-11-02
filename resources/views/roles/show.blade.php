@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Detalles del rol</h2>

    <div class="card p-4 shadow-sm">
        <div class="mb-3">
            <label class="fw-bold">Nombre:</label>
            <div class="form-control bg-light">{{ $role->name }}</div>
        </div>

        <div class="mb-3">
            <label class="fw-bold">Descripción:</label>
            <div class="form-control bg-light">{{ $role->description ?? '-' }}</div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning text-white">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
