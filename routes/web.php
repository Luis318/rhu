<?php

use App\Http\Controllers\AnalisisController;
use Illuminate\Support\Facades\Route;
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
Route::get('/analisis', [App\Http\Controllers\AnalisisController::class, 'ver'])->name('analisis');
Route::get('/analisisPeriodo', [App\Http\Controllers\AnalisisController::class, 'mostrarPeriodo'])->name('analisisPeriodo');
// Route::post('/analisis', [App\Http\Controllers\AnalisisController::class, 'ver'])->name('analisis');
//Route::get('/estados',[App\Http\Controllers\EstadosController::class, 'index'])->name('estados');
Route::resource('estados', EstadosController::class)->only(['index', 'create', 'store', 'show']);
Route::post('periodos', [App\Http\Controllers\AnalisisController::class, 'per'])->name('periodos');


Route::get('/cuenta', [App\Http\Controllers\CuentaController::class, 'index'])->name('cuenta');
Route::get('/create', [App\Http\Controllers\CuentaController::class, 'create'])->name('create');
Route::post('/store', [App\Http\Controllers\CuentaController::class, 'store'])->name('store');
Route::get('/getCuentaDetails/{empid}', [CuentaController::class, 'getCuentaDetails'])->name('getCuentaDetails');
//oute::get('/cuenta/cuenta/attr/{id}','cuentaController@view_attr');
//Route::post('/cuenta/cuenta/attr/{id}','cuentaController@save_attr');
