<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    public function empleados(){
        return $this->belongsTo(Empleados::class);
    }

    public function empleadosAsistencia(){
        $resultado = Asistencia::join("empleados", "empleados.id", "=", "asistencias.id_empleado")
            ->select('*')
            ->get();

        return $resultado;
    }
}
