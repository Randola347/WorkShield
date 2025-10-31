<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'amount',
        'payment_date',
        'method',
        'reference',
        'created_by',
    ];

    // Un pago pertenece a un empleado
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
