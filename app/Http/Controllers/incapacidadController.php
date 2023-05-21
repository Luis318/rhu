<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use Illuminate\Http\Request;

class incapacidadController extends Controller
{
    public function incapacidad()
    {
        $data['empleados'] = Empleados::all();
        return view('ausencias.incapacidad',$data);
    }
    
}
