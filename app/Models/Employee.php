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

    // Relación con rol
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Relación con pagos
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
