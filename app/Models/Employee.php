<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'area',
        'position',
        'hire_date',
        'salary',
        'bank_account',
        'notes',
        'role_id',
    ];

    /**
     * Accessor para mostrar el nombre completo del empleado
     * compatible con {{ $employee->full_name }} en las vistas.
     */
    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->last_name}");
    }
}
