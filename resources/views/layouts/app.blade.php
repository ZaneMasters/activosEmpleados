<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comboplay Inventory</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div class="text-lg">
                <a href="{{ route('employees.index') }}" class="mr-4 hover:text-gray-400">Empleados</a>
                <a href="{{ route('company_assets.index') }}" class="mr-4 hover:text-gray-400">Activos</a>
                <a href="{{ route('logs.index') }}" class="mr-4 hover:text-gray-400">Logs</a>
                <a href="{{ route('reports.employee-assets') }}" class="mr-4 hover:text-gray-400">Reporte de Empleados</a>
                <a href="{{ route('reports.department-assets') }}" class="mr-4 hover:text-gray-400">Reporte de Departamentos</a>
                <a href="{{ route('reports.inventory') }}" class="mr-4 hover:text-gray-400">Reporte de Inventario</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        @yield('content')
    </div>

</body>
</html>
