<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisis extends Model
{
    use HasFactory;

    public function recuperarCuentas($empresa, $periodo){
        $resultado = DetalleCatalogo::join("informe_contables", "informe_contables.id", "=", "detalle_catalogos.informecontable_id")->join("cuentas","cuentas.id", "=", "detalle_catalogos.cuentas_id")
        ->where("detalle_catalogos.empresas_id", "=", $empresa)
        ->where("detalle_catalogos.periodos_id", "=", $periodo)
        ->select("*")
        ->get();
        
        return $resultado;
    }
    public function conteo($empresa, $periodo){
        $resultado = DetalleCatalogo::join("informe_contables", "informe_contables.id", "=", "detalle_catalogos.informecontable_id")->join("cuentas","cuentas.id", "=", "detalle_catalogos.cuentas_id")
        ->where("detalle_catalogos.empresas_id", "=", $empresa)
        ->where("detalle_catalogos.periodos_id", "=", $periodo)
        ->select("*")->count();
        return $resultado;
    }
    public function totalActivos($rubro, $empresa, $periodo){
        $resultado = DetalleCatalogo::join("cuentas", "cuentas.id", "=", "detalle_catalogos.cuentas_id")
        ->join("tipo_cuentas", "tipo_cuentas.id", "=", "cuentas.tipocuentas_id")
        ->where("tipo_cuentas.rubro_id", "=", $rubro)
        ->where("detalle_catalogos.empresas_id", "=", $empresa)
        ->where("detalle_catalogos.periodos_id", "=", $periodo)
        ->sum("detalle_catalogos.monto_cuenta")
        ;

        return $resultado;
    }
    public function AnalisisVertical($valorCuenta,$idTipo, $totalActivo, $totalPasivos, $totalCapital){
        if($idTipo == 1 || $idTipo == 2){
            $resultado = $valorCuenta / $totalActivo * 100;
        }elseif($idTipo == 3 || $idTipo == 4){
            $resultado = $valorCuenta / $totalPasivos * 100;
        }elseif($idTipo == 5){
            $resultado = $valorCuenta / $totalCapital * 100;
        }
        return $resultado;
    }

}
