<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'serial_code', 'trademark', 'reference', 'description', 'employee_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

