<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página inicial: redirige a login si no hay sesión, o al dashboard si ya hay login
Route::get('/', function () {
    return redirect()->route('dashboard');
});


// Dashboard principal
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas del perfil (Laravel Breeze / Jetstream)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Módulo de empleados (CRUD protegido por login)
Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/public/employees/{id}', [EmployeeController::class, 'publicShow']);

// 🧾 Módulo de Pagos
Route::resource('payments', PaymentController::class);


require __DIR__ . '/auth.php';
