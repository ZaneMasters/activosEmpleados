@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4">Editar Log</h1>
        <form action="{{ route('logs.update', $log->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700">Empleado:</label>
                <select name="employee_id" id="employee_id" class="border rounded w-full py-2 px-3 text-gray-700" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $log->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="company_asset_id" class="block text-gray-700">Activo:</label>
                <select name="company_asset_id" id="company_asset_id" class="border rounded w-full py-2 px-3 text-gray-700" required>
                    @foreach($company_assets as $asset)
                        <option value="{{ $asset->id }}" {{ $log->company_asset_id == $asset->id ? 'selected' : '' }}>{{ $asset->serial_code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="assigner" class="block text-gray-700">Asignador:</label>
                <input type="text" name="assigner" id="assigner" value="{{ $log->assigner }}" class="border rounded w-full py-2 px-3 text-gray-700" required>
            </div>
            <div class="mb-4">
                <label for="payload" class="block text-gray-700">Payload:</label>
                <textarea name="payload" id="payload" class="border rounded w-full py-2 px-3 text-gray-700" required>{{ $log->payload }}</textarea>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
