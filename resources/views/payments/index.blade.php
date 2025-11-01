@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Pagos Registrados</h2>
        <a href="{{ route('payments.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nuevo Pago
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Empleado</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Método</th>
                    <th>Referencia</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->employee->full_name }}</td>
                        <td>₡{{ number_format($payment->amount, 2) }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->method }}</td>
                        <td>{{ $payment->reference ?? '-' }}</td>
                        <td>
                            <a href="{{ route('payments.show', $payment) }}" class="btn btn-info btn-sm text-white"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('payments.edit', $payment) }}" class="btn btn-warning btn-sm text-white"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('payments.destroy', $payment) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este pago?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3 d-flex justify-content-center">
        {{ $payments->links('vendor.pagination.bootstrap-5') }}
    </div>
</div>
@endsection
