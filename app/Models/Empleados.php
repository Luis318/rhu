<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    public function descuentos(){
        
        return $this->hasMany(PrestacionesLaborales::class);
    }

    public function vacaciones(){
        
        return $this->hasMany(Vacaciones::class);
    }

    public function getEmpleados(){
        $empleados = Empleados::latest()->get();
        return $empleados;
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function getSalario(){
        $salarioEmpleados = Empleados::all();
        return $salarioEmpleados;
    }

    public function aniosTrabajados(){

        $fechaContratacion = $this->fechaContratacion;
        $fechaActual = now();

        $aniosTrabajados = $fechaActual->diffInYears($fechaContratacion);

        return $aniosTrabajados;
    }
    
}
