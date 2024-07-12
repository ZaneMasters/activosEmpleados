<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Employee;
use App\Models\CompanyAsset;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('employee', 'companyAsset')->get();
        return view('logs.index', compact('logs'));
    }

    public function create()
    {
        $employees = Employee::all();
        $company_assets = CompanyAsset::all();
        return view('logs.create', compact('employees', 'company_assets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'company_asset_id' => 'required|exists:company_assets,id',
            'assigner' => 'required|string|max:255',
            'payload' => 'required|string',
        ]);

        $data = $request->all();
        $data['payload'] = json_encode($data['payload']); // Convert payload to JSON

        Log::create($data);

        return redirect()->route('logs.index')->with('success', 'Log creado exitosamente.');
    }

    public function show(Log $log)
    {
        return view('logs.show', compact('log'));
    }

    public function edit(Log $log)
    {
        $employees = Employee::all();
        $company_assets = CompanyAsset::all();
        return view('logs.edit', compact('log', 'employees', 'company_assets'));
    }

    public function update(Request $request, Log $log)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'company_asset_id' => 'required|exists:company_assets,id',
            'assigner' => 'required|string|max:255',
            'payload' => 'required|string',
        ]);

        $data = $request->all();
        $data['payload'] = json_encode($data['payload']); // Convert payload to JSON

        $log->update($data);

        return redirect()->route('logs.index')->with('success', 'Log actualizado exitosamente.');
    }

    public function destroy(Log $log)
    {
        $log->delete();

        return redirect()->route('logs.index')->with('success', 'Log eliminado exitosamente.');
    }
}
