@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Editar Activo</h1>
        <form action="{{ route('company_assets.update', $company_asset->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="serial_code" class="block text-gray-700">Código Serial:</label>
                <input type="text" name="serial_code" id="serial_code" value="{{ $company_asset->serial_code }}" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="trademark" class="block text-gray-700">Marca:</label>
                <input type="text" name="trademark" id="trademark" value="{{ $company_asset->trademark }}" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="reference" class="block text-gray-700">Referencia:</label>
                <input type="text" name="reference" id="reference" value="{{ $company_asset->reference }}" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Descripción:</label>
                <textarea name="description" id="description" class="border rounded w-full py-2 px-3 text-gray-700" required>{{ $company_asset->description }}</textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </div>
        </form>
    </div>
@endsection


