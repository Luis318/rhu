<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class PrestacionesController extends Controller
{
    //
    public function index(){

        return view('prestaciones.prestaciones');
    }
    
    public function caclularDescuentos(){
        $empleados = Empleados::with('descuentos')->get();
        dd($empleados);
    }
}
