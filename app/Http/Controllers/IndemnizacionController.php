<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndemnizacionController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indemnizacionList()
    {
        return view('indemnizaciones\indemnizacion-list');
    }
}
