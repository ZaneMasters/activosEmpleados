<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyAssetController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ReportController;

Route::resource('employees', EmployeeController::class);
Route::resource('company_assets', CompanyAssetController::class);
Route::resource('logs', LogController::class);

Route::post('/assign-asset', [LogController::class, 'assignAsset'])->name('assign-asset');

Route::get('reports/employee-assets', [ReportController::class, 'employeeAssets'])->name('reports.employee-assets');
Route::get('reports/department-assets', [ReportController::class, 'departmentAssets'])->name('reports.department-assets');
Route::get('reports/inventory', [ReportController::class, 'inventory'])->name('reports.inventory');



