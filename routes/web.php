<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\Tramo_userController;
use App\Http\Controllers\TramoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Actividad;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('usuarios', [UserController::class, 'index'])->name('usuarios');

Route::get('users/create', [UserController::class, 'create'])->name('usuarios.create');

Route::post('users',[UserController::class, 'store'])->name('usuarios.store');

Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');

Route::put('users/{usuario}', [UserController::class, 'update'])->name('usuarios.update');

Route::delete('users/{usuario}', [UserController::class, 'destroy'])->name('usuarios.destroy');

Route::get('actividades', [ActividadController::class, 'index'])->name('actividades');

Route::get('actividades/create', [ActividadController::class, 'create'])->name('actividades.create');

Route::post('actividades',[ActividadController::class, 'store'])->name('actividades.store');

Route::get('actividades/{id}/edit', [ActividadController::class, 'edit'])->name('actividades.edit');

Route::put('actividades/{actividad}', [ActividadController::class, 'update'])->name('actividades.update');

Route::delete('actividades/{actividad}', [ActividadController::class, 'destroy'])->name('actividades.destroy');

Route::get('tramos', [TramoController::class, 'index'])->name('tramos');

Route::get('tramos/create', [TramoController::class, 'create'])->name('tramos.create');

Route::post('tramos',[TramoController::class, 'store'])->name('tramos.store');

Route::delete('tramos/{tramo}', [TramoController::class, 'destroy'])->name('tramos.destroy');

Route::get('Tramo_users',[Tramo_userController::class, 'index'])->name('tramo_user');

Route::post('Tramo_users',[Tramo_userController::class, 'store'])->name('tramo_user.store');

Route::delete('Tramo_users/{Tramo_user}', [Tramo_userController::class, 'destroy'])->name('Tramo_users.destroy');

Route::get('/apirest', function () {
    return view('apiRest');
})->name('apirest');

Route::get('/generarPdf', function () {
    return view('imprimirPDF');
})->name('generarPdf');

Route::get('tramosPdf', [TramoController::class, 'pdf'])->name('tramosPdf');

require __DIR__.'/auth.php';
