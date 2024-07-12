@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Logs de Asignaciones</h1>
            <a href="{{ route('logs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Nueva Asignación</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Activo</th>
                    <th class="py-2">Empleado</th>
                    <th class="py-2">Asignador</th>
                    <th class="py-2">Fecha de Asignación</th>
                    <th class="py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    <tr>
                        <td class="border px-4 py-2">{{ $log->companyAsset->serial_code }}</td>
                        <td class="border px-4 py-2">{{ $log->employee->name }}</td>
                        <td class="border px-4 py-2">{{ $log->assigner }}</td>
                        <td class="border px-4 py-2">{{ $log->created_at->format('d-m-Y H:i') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('logs.show', $log->id) }}" class="text-blue-500 hover:text-blue-700">Ver</a>
                            <a href="{{ route('logs.edit', $log->id) }}" class="text-yellow-500 hover:text-yellow-700">Editar</a>
                            <form action="{{ route('logs.destroy', $log->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
