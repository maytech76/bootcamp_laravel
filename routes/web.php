<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



/* Algunas rutas y Metodos que usaremos mas adelante */

/* Route::post(); */ /* Enviar informacion desde un formulario y registrar en DB */
/* Route::put(); */ /* Actualizar informacion desde un formulario y registrar en DB */
/* Route::delete($id); */ /* Eliminar un registro segun ID selecionado */


 
 // Aqui visualizamos las rutas que compone el grupo auth, a las cuales accede solomente si estas autenticado
 
Route::middleware('auth')->group(function () { 
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', function(){ return view('chirps.index');  })->name ('chirps.index');
});

require __DIR__.'/auth.php'; 
