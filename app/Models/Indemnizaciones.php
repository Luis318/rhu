<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indemnizaciones extends Model
{
    use HasFactory;

    public function getIndeminzaciones(){
        $indemnizaciones = Indemnizaciones::latest()->get();
        return $indemnizaciones;
    }
}
