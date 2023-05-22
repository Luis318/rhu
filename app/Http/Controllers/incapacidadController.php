<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\AusenciaIncapacidades;
use Illuminate\Http\Request;
use DataTables;

class incapacidadController extends Controller
{
    protected $AusenciaIncapacidades, $empleados;

    public function __construct(AusenciaIncapacidades $AusenciaIncapacidades, Empleados $empleados)
    {
        $this->AusenciaIncapacidades = $AusenciaIncapacidades;
        $this->empleados = $empleados;
    }
    public function incapacidad()
    {
        $data['empleados'] = Empleados::all();
        return view('ausencias.incapacidad', $data);
    }

    public function obtenerNombreEmpleado($idEmpleado)
    {
        $empleado = Empleados::find($idEmpleado);

        if ($empleado) {
            $nombreCompleto = $empleado->primerNombre . ' ' . $empleado->primerApellido;
            return $nombreCompleto;
        }

        return 'Empleado no encontrado';
    }

    public function store(Request $request)
    {

        $nombreEmpleado = $this->obtenerNombreEmpleado($request->input('idEmpleado'));
        // Crear una nueva instancia de Asistencia con los datos validados
        $this->AusenciaIncapacidades->empleado_id = $request->input('id_empleado');
        $this->AusenciaIncapacidades->fecha = $request->input('fecha');
        $this->AusenciaIncapacidades->fecha_inicio = $request->input('inicio');
        $this->AusenciaIncapacidades->fecha_fin = $request->input('fin');
        $this->AusenciaIncapacidades->tipo_incapacidad = $request->input('tipo_incapacidad');
        // Guardar el archivo adjunto en una ubicación específica y guardar la ruta en la base de datos
        $nombreIncapacidad = $request->input('tipo_incapacidad');
        $nombreArchivo = $nombreIncapacidad . ' - ' . $nombreEmpleado . ' - ' . $request->input('fecha') . '.' . $request->file('comprobante')->getClientOriginalExtension();
        $comprobantePath = $request->file('comprobante')->storeAs('incapacidad', $nombreArchivo, 'incapacidad');
        $this->AusenciaIncapacidades->comprobante = $comprobantePath;
        $this->AusenciaIncapacidades->motivo_incapacidad = $request->input('motivo');

        // Guardar la asistencia en la base de datos
        $this->AusenciaIncapacidades->save();

        // Redirigir a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('incapacidad')->with('success', 'La asistencia se ha registrado correctamente.');
    }

    public function verIncapacidades(Request $request)
    {
        // $incapacidad = $this->AusenciaIncapacidades->empleadosAusenciaIncapacidad();
        // dd($incapacidad);
        if ($request->ajax()) {
            $incapacidad = $this->AusenciaIncapacidades->empleadosAusenciaIncapacidad();
            //dd($incapacidad);
            return Datatables::of($incapacidad)
                ->addIndexColumn()
                ->addColumn('acciones', function ($row) {

                    $btn = '<a href="" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';

                    return $btn;
                })
                ->addcolumn('primerNombre', function ($row) {
                    return $row->primerNombre . ' ' . $row->segundoNombre;
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('ausencias.view_incapacidades');
    }

}