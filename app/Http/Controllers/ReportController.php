<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
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
        $departmentAssets = Department::withCount('companyAssets')->get();
        return view('reports.department_assets', compact('departmentAssets'));
    }

    public function inventory()
    {
        $inventory = CompanyAsset::with('employee')->get();
        return view('reports.inventory', compact('inventory'));
    }
}

