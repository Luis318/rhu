<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\AreaPuestos;
use App\Models\Asistencia;
use DataTables;

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
        return view('ausencias.controlausencias', $data);
    }

    public function store(Request $request)
    {

        $idEmpleado = $request->input('id_empleado');
        $fecha = $request->input('fecha');

        //buscar la asistencia del empleado
        $asistencia = $this->asistencias->where('id_empleado', $idEmpleado)->where('fecha', $fecha)->first();

        if ($asistencia) {
            //actualizar los registros existentes
            $asistencia->hora_entrada = $request->input('entrada');
            $asistencia->hora_salida = $request->input('salida');
            $asistencia->fecha = $request->input('fecha');
            $asistencia->observaciones = $request->input('observaciones');
            $asistencia->inconsistencia = $request->has('justificado');
            $asistencia->horas_tarde = $request->input('retraso');
            $asistencia->descuentos = $request->input('descuento');
            $asistencia->id_empleado = $request->input('id_empleado');
            $asistencia->save();

        } else {
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

    public function verAsistencias(Request $request)
    {
        // $data['empleados'] = Empleados::all();
        // return view('ausencias.view_ausencias',$data);


        // //filtrar por nombre
        // if ($request->has('nombre')) {
        //     $empleados->where('primerNombre', 'LIKE', '%' . $request->input('nombre') . '%')
        //         ->orWhere('segundoNombre', 'LIKE', '%' . $request->input('nombre') . '%')
        //         ->orWhere('primerApellido', 'LIKE', '%' . $request->input('nombre') . '%')
        //         ->orWhere('segundoApellido', 'LIKE', '%' . $request->input('nombre') . '%');
        // }

        // //filtrar por dui
        // if ($request->has('dui')) {
        //     $empleados->where('dui', $request->input('dui'));
        // }
        if ($request->ajax()) {
            
            $asistencias = $this->asistencias->empleadosAsistencia();

                return Datatables::of($asistencias)
                    ->addIndexColumn()
                    ->addColumn('acciones', function ($row) {

                        $btn = '<a href="" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';
        
                        return $btn;
                    })
                    ->addcolumn('primerNombre', function ($row) {
                        return $row->primerNombre . ' ' . $row->segundoNombre;
                    })
                    ->addColumn('inconsistencia', function ($row) {
                        if ($row->inconsistencia == 1) {
                            return 'Justificado';
                        } else {
                            return 'No justificado';
                        }
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }

        return view('ausencias.view_ausencias');
    }
}