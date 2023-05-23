<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorasExtras extends Model
{
    use HasFactory;
    public function empleado(){
        return $this->belongTo(Empleado::class);
    }

    public function empleadosHoras(){
        $resultado = HorasExtras::join("empleados", "empleados.id", "=", "horas_extras.id_empleado")
            ->select('*')
            ->get();

        return $resultado;
    }
}
