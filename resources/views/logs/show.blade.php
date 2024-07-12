@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Detalle del Log</h1>
        <p><strong>Activo:</strong> {{ $log->companyAsset->serial_code }}</p>
        <p><strong>Empleado:</strong> {{ $log->employee->name }}</p>
        <p><strong>Asignador:</strong> {{ $log->assigner }}</p>
        <p><strong>Fecha de Asignación:</strong> {{ $log->created_at->format('d-m-Y H:i') }}</p>
        <p><strong>Payload:</strong> {{ $log->payload }}</p>
        <a href="{{ route('logs.index') }}" class="text-blue-500 hover:text-blue-700">Volver</a>
    </div>
@endsection
