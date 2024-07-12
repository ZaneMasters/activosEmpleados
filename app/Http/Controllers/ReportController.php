<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\CompanyAsset;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function employeeAssets()
    {
        $employeeAssets = Employee::withCount('companyAssets')->get();
        return view('reports.employee_assets', compact('employeeAssets'));
    }

    public function departmentAssets()
    {
        // Calculamos los activos por departamento basado en los empleados
        $departmentAssets = Employee::selectRaw('department, COUNT(company_assets.id) as company_assets_count')
                                    ->leftJoin('company_assets', 'employees.id', '=', 'company_assets.employee_id')
                                    ->groupBy('department')
                                    ->get();
        return view('reports.department_assets', compact('departmentAssets'));
    }

    public function inventory()
    {
        $inventory = CompanyAsset::with('employee')->get();
        return view('reports.inventory', compact('inventory'));
    }
}

