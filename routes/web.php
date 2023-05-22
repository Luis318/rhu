<?php

use App\Http\Controllers\AnalisisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CuentaController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Indemnizaciones
Route::get('/indemnizacion-list', [App\Http\Controllers\IndemnizacionController::class, 'indemnizacionList'])->name('indemnizacion-list');
Route::get('/indemnizacion-create', [App\Http\Controllers\IndemnizacionController::class, 'indemnizacionCreate'])->name('indemnizacion-create');
Route::post('/indemnizacion-strore', [App\Http\Controllers\IndemnizacionController::class, 'indemnizacionStore'])->name('indemnizacion-store');
Route::get('/indemnizacion-view/{id}', [App\Http\Controllers\IndemnizacionController::class, 'indemnizacionView'])->name('indemnizacion-view');

//Vacaciones
Route::get('/vacaciones-list', [App\Http\Controllers\vacacionesController::class, 'vacacionesList'])->name('vacaciones-list');
Route::get('/vacaciones-create', [App\Http\Controllers\vacacionesController::class, 'vacacionesCreate'])->name('vacaciones-create');
Route::post('/vacaciones-strore', [App\Http\Controllers\vacacionesController::class, 'vacacionesStore'])->name('vacaciones-store');
Route::get('/vacaciones-view/{id}', [App\Http\Controllers\vacacionesController::class, 'vacacionesView'])->name('vacaciones-view');
Route::get('/vacaciones-update/{id}', [App\Http\Controllers\vacacionesController::class, 'vacacionesUpdate'])->name('vacaciones-update');
Route::post('/vacaciones-store-update', [App\Http\Controllers\vacacionesController::class, 'vacacionesStoreUpdate'])->name('vacaciones-store-update');

//Empleados
Route::get('/empleados-list', [App\Http\Controllers\empleadoController::class, 'empleadosList'])->name('empleados-list');
Route::get('/empleados-create', [App\Http\Controllers\empleadoController::class, 'empleadosCreate'])->name('empleados-create');
Route::post('/empleados-strore', [App\Http\Controllers\empleadoController::class, 'empleadosStore'])->name('empleados-store');
Route::get('/empleados-view/{id}', [App\Http\Controllers\empleadoController::class, 'empleadosView'])->name('empleados-view');

//planilla
Route::get('/salarios', [App\Http\Controllers\PrestacionesController::class, 'index'])->name('salarios');
Route::get('/descuentos', [App\Http\Controllers\PrestacionesController::class, 'caclularDescuentos'])->name('descuentos');

Route::get('/boleta/{empleado_id}', [App\Http\Controllers\PrestacionesController::class, 'verBoleta'])->name('boleta_empleado');
Route::get('/generate-boletas', [App\Http\Controllers\PrestacionesController::class, 'boletasMultiples'])->name('generate-boletas');
Route::get('/generate-pdf', [App\Http\Controllers\PrestacionesController::class, 'generatePDF'])->name('generate-pdf');
Route::post('/boletaUnica', [App\Http\Controllers\PrestacionesController::class, 'boletaIndividual'])->name('boleta_unica');

//horas extras
Route::get('/horasExtras/{empleado_id}', [App\Http\Controllers\HorasController::class, 'viewHorasExtras'])->name('horas_extras');

Route::get('/horas', [App\Http\Controllers\HorasController::class, 'index'])->name('horas');

Route::post('guardar_horas_extras', [App\Http\Controllers\HorasController::class, 'store'])->name('guardar_horas_extras');



Route::get('/vacaciones', [App\Http\Controllers\vacacionesController::class, 'index'])->name('vacaciones');

//Aguinaldos
Route::get('/aguinaldos', [App\Http\Controllers\AguinaldosController::class, 'index'])->name('aguinaldos');

Route::get('/pdf-aguinaldos', [App\Http\Controllers\AguinaldosController::class, 'generatePDF'])->name('pdf-aguinaldos');
Route::get('/aguinaldos', [App\Http\Controllers\AguinaldosController::class, 'index'])->name('aguinaldos');

//Incapacidades
Route::get('/incapacidad', [App\Http\Controllers\incapacidadController::class, 'incapacidad'])->name('incapacidad');
Route::get('/controlausencias', [App\Http\Controllers\ausenciasController::class, 'ausencias'])->name('ausencias');

Route::get('/empleado', [App\Http\Controllers\empleadoController::class, 'empleado'])->name('empleado');

//control de asistencias
Route::get('/controlausencias', [App\Http\Controllers\ausenciasController::class, 'ausencias'])->name('ausencias');
Route::post('/agregarAsistencia', [App\Http\Controllers\ausenciasController::class, 'store'])->name('agregarasistencia');
Route::get('/verasistencia', [App\Http\Controllers\ausenciasController::class, 'verAsistencias'])->name('ver_asistencia');

//control de incapacidades
Route::post('/agregarIncapacidad', [App\Http\Controllers\incapacidadController::class, 'store'])->name('agregarincapacidad');
