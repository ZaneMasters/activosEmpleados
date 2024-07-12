@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Reporte de Activos por Departamento</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Departamento</th>
                    <th class="py-2">Número de Activos</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departmentAssets as $department)
                    <tr>
                        <td class="border px-4 py-2">{{ $department->name }}</td>
                        <td class="border px-4 py-2">{{ $department->assets_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

