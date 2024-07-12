@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Reporte General del Inventario</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Activo</th>
                    <th class="py-2">Asignado a</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td class="border px-4 py-2">{{ $asset->serial_code }}</td>
                        <td class="border px-4 py-2">{{ optional($asset->employee)->name ?? 'No asignado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
