<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\PeluquerosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\FullCalendarController;
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

Route::get('/peluqueros', [PeluquerosController::class, 'index'])->name('peluqueros.index');
Route::get('/peluqueros/edit/{id}', [PeluquerosController::class, 'edit'])->name('peluqueros.edit');
Route::put('/editar-peluquero/{id}', [PeluquerosController::class, 'update'])->name('peluqueros.update');
Route::delete('/peluqueros/{id}', [PeluquerosController::class, 'destroy'])->name('peluqueros.destroy');
Route::get('/peluqueros/create', [PeluquerosController::class, 'create'])->name('peluqueros.create');
Route::get('/peluqueros/{id}', [PeluquerosController::class, 'show'])->name('peluqueros.show');
Route::post('/peluqueros/store', [PeluquerosController::class, 'store'])->name('peluqueros.store');

Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::get('/servicios/create', [ServiciosController::class, 'create'])->name('servicios.create');
Route::post('/servicios/store', [ServiciosController::class, 'store'])->name('servicios.store');
Route::get('/editar-servicio/{id}', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::put('/editar-servicio/{id}', [ServiciosController::class, 'update'])->name('servicios.update');
Route::get('/servicios/{id}', [ServiciosController::class, 'show'])->name('servicios.show');
Route::delete('/servicios/{id}', [ServiciosController::class, 'destroy'])->name('servicios.destroy');


Route::get('/pedircita', [FullCalendarController::class,'index'])->name('pedirCita');
Route::get('/events', [FullCalendarController::class, 'getEvents']);
Route::delete('/schedule/{id}', [FullCalendarController::class, 'deleteEvent']);
Route::put('/schedule/{id}', [FullCalendarController::class, 'update']);
Route::put('/schedule/{id}/resize', [FullCalendarController::class, 'resize']);
Route::get('/events/search', [FullCalendarController::class, 'search']);

Route::get('/add-schedule', [FullCalendarController::class, 'add'], 'add');
Route::post('create-schedule', [FullCalendarController::class, 'create']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
