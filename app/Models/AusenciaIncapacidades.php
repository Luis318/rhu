<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AusenciaIncapacidades extends Model
{
    use HasFactory;

    public function empleados(){
        return $this->belongsTo(Empleados::class);
    }

    public function empleadosAusenciaIncapacidad(){
        $resultado = AusenciaIncapacidades::join("empleados", "empleados.id", "=", "ausencia_incapacidades.empleado_id")
            ->select('*')
            ->get();

        return $resultado;
    }
}
