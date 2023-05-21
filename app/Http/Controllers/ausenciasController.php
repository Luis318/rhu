<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use App\Models\AreaPuestos;
use App\Models\Asistencia;

use Illuminate\Http\Request;

class ausenciasController extends Controller
{
    protected $asistencias, $empleados, $areaPuestos;

    public function __construct(Asistencia $asistencias, Empleados $empleados, AreaPuestos $areaPuestos)
    {
        $this->asistencias = $asistencias;
        $this->empleados = $empleados;
        $this->areaPuestos = $areaPuestos;
    }
    public function ausencias()
    {
        $data['empleados'] = Empleados::all();
        return view('ausencias.controlausencias',$data);
    }

    public function store(Request $request){

        $idEmpleado = $request->input('idEmpleado');
        $fecha = $request->input('fecha');

        //buscar la asistencia del empleado
        $asistencia = $this->asistencias->where('id_empleado',$idEmpleado)->where('fecha',$fecha)->first();

        if($asistencia){
            //actualizar los registros existentes
            $asistencia->hora_entrada = $request->input('entrada');
            $asistencia->hora_salida = $request->input('salida');
            $asistencia->fecha = $request->input('fecha');
            $asistencia->observaciones = $request->input('observaciones');
            $asistencia->inconsistencia = $request->has('justificado');
            $asistencia->horas_tarde = $request->input('retraso');
            $asistencia->descuentos = $request->input('descuento');
            $asistencia->id_empleado = $idEmpleado;
            $asistencia->save();

        }else{
            $this->asistencias->hora_entrada = $request->input('entrada');
            $this->asistencias->hora_salida = $request->input('salida');
            $this->asistencias->fecha = $request->input('fecha');
            $this->asistencias->observaciones = $request->input('observaciones');
            $this->asistencias->inconsistencia = $request->has('justificado');
            $this->asistencias->horas_tarde = $request->input('retraso');
            $this->asistencias->descuentos = $request->input('descuento');
            $this->asistencias->id_empleado = $idEmpleado;
            $this->asistencias->save();
        }

        return redirect()->route('ausencias');

    }
}
