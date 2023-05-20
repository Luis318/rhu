<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ausenciasController extends Controller
{
    public function ausencias()
    {
        return view('ausencias.controlausencias');
    }
}
