<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('tareas', App\Http\Controllers\TareaController::class)->middleware('auth');
Route::resource('listas', App\Http\Controllers\ListaController::class)->middleware('auth');
Route::resource('materias', App\Http\Controllers\MateriaController::class)->middleware('auth');
Route::resource('horario', App\Http\Controllers\HorarioController::class)->middleware('auth');
Route::resource('/', App\Http\Controllers\IndexController::class)->middleware('auth');
Route::resource('actividad', App\Http\Controllers\ActividadController::class)->middleware('auth');
Route::resource('index', App\Http\Controllers\IndexController::class)->middleware('auth');

Route::get('/actividad/{id}/index', [App\Http\Controllers\ActividadController::class, 'index'])->name('actividades.index');
Route::get('/actividad/{id}/create', [App\Http\Controllers\ActividadController::class, 'create'])->name('actividades.create');

Route::get('/tarea/{id}/index', [App\Http\Controllers\TareaController::class, 'index'])->name('tareas.index');
Route::get('/tarea/{id}/create', [App\Http\Controllers\TareaController::class, 'create'])->name('tareas.create');

Route::post('/actividad/store', 'ActividadController@store')->name('actividades.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



