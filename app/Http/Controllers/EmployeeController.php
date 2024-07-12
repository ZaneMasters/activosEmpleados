<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'document_type' => 'required|string|max:45',
            'document_number' => 'required|integer',
            'position' => 'required|string|max:250',
            'department' => 'required|string|max:250',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'document_type' => 'required|string|max:45',
            'document_number' => 'required|integer',
            'position' => 'required|string|max:250',
            'department' => 'required|string|max:250',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }

    public function report()
    {
        $employees = Employee::withCount('companyAssets')->get();
        return view('reports.employee_assets', compact('employees'));
    }

    public function departmentReport()
    {
        $departments = Employee::withCount('companyAssets')
            ->get()
            ->groupBy('department')
            ->map(function ($department) {
                return $department->sum('company_assets_count');
            })
            ->sort()
            ->first();

        return view('reports.department_assets', compact('departments'));
    }
}

