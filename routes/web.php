<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropiedadesController;
use App\Http\Controllers\NotificacionController;

Route::get('/', HomeController::class)->name('home');

// Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'rol.vendedor'])->name('notificaciones');

Route::get('/dashboard', [PropiedadesController::class, 'index'])->middleware(['auth', 'verified', 'rol.vendedor'])->name('propiedades.index');
Route::get('/propiedades/create', [PropiedadesController::class, 'create'])->middleware(['auth', 'verified'])->name('propiedades.create');
Route::get('/propiedades/{propiedad}/edit', [PropiedadesController::class, 'edit'])->middleware(['auth', 'verified'])->name('propiedades.edit');
Route::get('/propiedades/{propiedad}', [PropiedadesController::class, 'show'])->name('propiedades.show');
Route::get('/candidatos/{propiedad}', [CandidatoController::class, 'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
