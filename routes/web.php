<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;

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

Route::resource('employees', EmployeeController::class);

Route::resource('payments', PaymentController::class);

Route::resource('roles', RoleController::class);

Route::get('/logs', function () {
    $logPath = storage_path('logs/laravel.log');
    if (!file_exists($logPath)) {
        return response('<pre>No hay registros disponibles.</pre>', 200);
    }
    $content = @file_get_contents($logPath) ?: 'No se pudo leer el archivo de logs.';
    return response("<pre>".e($content)."</pre>", 200)->header('Content-Type', 'text/html');
});

require __DIR__ . '/auth.php';
