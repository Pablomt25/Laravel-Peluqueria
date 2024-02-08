<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\PeluquerosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peluqueros', [PeluquerosController::class, 'index'])->name('peluqueros.mostrarTodos');
Route::get('/peluqueros/{id}', [PeluquerosController::class, 'edit'])->name('peluqueros.edit');
Route::delete('/peluqueros/{id}', [PeluquerosController::class, 'destroy'])->name('peluqueros.destroy');


Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/servicios/{id}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::get('/servicios/{id}', [ServiciosController::class, 'show'])->name('servicios.show');
Route::delete('/servicios/{id}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');
Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');


Route::get('/calendario', [\App\Http\Controllers\FullCalendar::class,'index'])->name('calendario.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pedircita', [CitasController::class, 'pedirCita'])->name('pedirCita');
});


require __DIR__.'/auth.php';
