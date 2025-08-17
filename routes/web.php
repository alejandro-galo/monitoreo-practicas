<?php

use Illuminate\Support\Facades\Route;

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
//----------------------------------------
use App\Http\Controllers\AuthController;

Route::get('/go', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {

    Route::get('/docentes', [AdminController::class, 'docentes']);
    Route::get('/docentes/nuevo', [AdminController::class, 'formNuevoDocente']);
    Route::post('/docentes/guardar', [AdminController::class, 'guardarDocente']);
    // Estudiantes
    Route::get('/estudiantes', [AdminController::class, 'estudiantes']);
    Route::get('/estudiantes/nuevo', [AdminController::class, 'formNuevoEstudiante']);
    Route::post('/estudiantes/guardar', [AdminController::class, 'guardarEstudiante']);
    Route::get('/Trabajadores', [AdminController::class, 'index']);
    Route::get('/Facultad', [AdminController::class, 'facu']);
    Route::get('/Carreras', [AdminController::class, 'carrera']);
    Route::get('/Facultad/Agregar', [AdminController::class, 'addfacu']);

    // Empresas
    Route::get('/empresas', [AdminController::class, 'empresas']);
    Route::get('/empresas/nuevo', [AdminController::class, 'formNuevaEmpresa']);
    Route::post('/empresas/guardar', [AdminController::class, 'guardarEmpresa']);

    Route::get('/practicas', [AdminController::class, 'practicas']);
    Route::get('/practicas/nueva', [AdminController::class, 'formNuevaPractica']);
    Route::post('/practicas/guardar', [AdminController::class, 'guardarPractica']);
    Route::post('/facultad/guardar', [AdminController::class, 'store'])->name('facultad.store');


    Route::get('/carreras', [AdminController::class, 'indexCarrera'])->name('admin.carreras.index');
    Route::get('/Carreras/Agregar', [AdminController::class, 'createCarrera'])->name('admin.carreras.create');
    Route::post('/carreras', [AdminController::class, 'storeCarrera'])->name('admin.carreras.store');


});



use App\Http\Controllers\UserController;

Route::get('/user', [UserController::class, 'index']);

use App\Http\Controllers\PracticaController;
Route::get('/', [PracticaController::class, 'index'])->name('practicas.index');
Route::get('/practicas/{id}', [PracticaController::class, 'show'])->name('practicas.show');
Route::get('/user/asesorados', [App\Http\Controllers\UserController::class, 'asesorados'])->name('user.asesorados');
