<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class incapacidadController extends Controller
{
    public function incapacidad()
    {
        return view('ausencias.incapacidad');
    }
    
}
