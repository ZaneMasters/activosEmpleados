@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Activos de la Empresa</h1>
        <a href="{{ route('company_assets.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Crear Nuevo Activo</a>
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Código Serial</th>
                    <th class="px-4 py-2">Marca</th>
                    <th class="px-4 py-2">Referencia</th>
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Asignado a</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($company_assets as $asset)
                    <tr>
                        <td class="border px-4 py-2">{{ $asset->id }}</td>
                        <td class="border px-4 py-2">{{ $asset->serial_code }}</td>
                        <td class="border px-4 py-2">{{ $asset->trademark }}</td>
                        <td class="border px-4 py-2">{{ $asset->reference }}</td>
                        <td class="border px-4 py-2">{{ $asset->description }}</td>
                        <td class="border px-4 py-2">{{ $asset->employee ? $asset->employee->name : 'No asignado' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('company_assets.edit', $asset->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
                            <form action="{{ route('company_assets.destroy', $asset->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
