<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'company_asset_id', 'assigner', 'payload'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function companyAsset()
    {
        return $this->belongsTo(CompanyAsset::class);
    }
}
