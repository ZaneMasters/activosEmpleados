@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Crear Nuevo Empleado</h1>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nombre:</label>
                <input type="text" name="name" id="name" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="document_type" class="block text-gray-700">Tipo de Documento:</label>
                <input type="text" name="document_type" id="document_type" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="document_number" class="block text-gray-700">Número de Documento:</label>
                <input type="number" name="document_number" id="document_number" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700">Posición:</label>
                <input type="text" name="position" id="position" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="department" class="block text-gray-700">Departamento:</label>
                <input type="text" name="department" id="department" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear</button>
            </div>
        </form>
    </div>
@endsection
