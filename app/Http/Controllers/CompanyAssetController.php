<?php

namespace App\Http\Controllers;

use App\Models\CompanyAsset;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyAssetController extends Controller
{
    public function index()
    {
        $company_assets = CompanyAsset::with('employee')->get();
        return view('company_assets.index', compact('company_assets'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('company_assets.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serial_code' => 'required|string|max:250',
            'trademark' => 'required|string|max:250',
            'reference' => 'required|string|max:250',
            'description' => 'nullable|string',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        CompanyAsset::create($request->all());

        return redirect()->route('company_assets.index')
            ->with('success', 'Asset created successfully.');
    }

    public function show(CompanyAsset $companyAsset)
    {
        return view('company_assets.show', compact('companyAsset'));
    }

    public function edit(CompanyAsset $companyAsset)
    {
        $employees = Employee::all();
        return view('company_assets.edit', compact('companyAsset', 'employees'));
    }

    public function update(Request $request, CompanyAsset $companyAsset)
    {
        $request->validate([
            'serial_code' => 'required|string|max:250',
            'trademark' => 'required|string|max:250',
            'reference' => 'required|string|max:250',
            'description' => 'nullable|string',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $companyAsset->update($request->all());

        return redirect()->route('company_assets.index')
            ->with('success', 'Asset updated successfully.');
    }

    public function destroy(CompanyAsset $companyAsset)
    {
        $companyAsset->delete();

        return redirect()->route('company_assets.index')
            ->with('success', 'Asset deleted successfully.');
    }

    public function inventoryReport()
    {
        $assets = CompanyAsset::with('employee')->get();
        return view('reports.inventory', compact('assets'));
    }
}
