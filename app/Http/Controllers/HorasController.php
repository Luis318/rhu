<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\HorasExtras;
use App\Models\PrestacionesLaborales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class HorasController extends Controller
{
    protected $Empleados, $PrestacionesLaborales, $HorasExtras;
    public function __construct(Empleados $Empleados, HorasExtras $HorasExtras, PrestacionesLaborales $PrestacionesLaborales)
    {
        $this->Empleados = $Empleados;
        $this->PrestacionesLaborales = $PrestacionesLaborales;
        $this->HorasExtras = $HorasExtras;
    }
    public function index(Request $request)
    {
        //dd($request);
        //dd($this->calcularIsss());
        if ($request->ajax()) {
            $data = Empleados::latest()->get();
            $horas = [];
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('acciones', function ($row) {

                    $btn = '<a href="' . route('horas_extras', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';

                    return $btn;
                })
                ->addcolumn('salario_base', function ($row) {
                    return number_format($row->salario_base, 2, '.', ',');
                })
                ->addcolumn('primerNombre', function ($row) {
                    return $row->primerNombre . ' ' . $row->segundoNombre;
                })
                ->addColumn('horas', function ($row) use ($horas) {
                    return isset( $horas[$row->id] ) ? number_format($horas[$row->id], 2, '.', ','): '';
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('prestaciones.horasEmpleado');
    }

    public function viewHorasExtras($idEmpleado)
    {
        $empleado = Empleados::find($idEmpleado);
        return view('prestaciones.horasExtras', compact('empleado'));
    }

    public function store(Request $request)
    {
        //$this->insertarHorasExtras($request->empleado_id, $request->cdiurnas, $request->montodiurnas, $request->cnocturnas, $request->montonocturnas, $request->cnocturnasf, $request->montonocturnasf, $request->cdiurnasf, $request->montodiurnasf, $request->fecha);

        //Revisar que los datos son correctos
        $this->actualizarIncertarHoras($request->empleado_id, $request->cdiurnas, $request->montodiurnas, $request->cnocturnas, $request->montonocturnas, $request->cnocturnasf, $request->montonocturnasf, $request->cdiurnasf, $request->montodiurnasf, $request->fecha);

        //$this->insertarHorasExtras($request->empleado_id, $request->cdiurnas, $request->montodiurnas, $request->cnocturnas, $request->montonocturnas, $request->cnocturnasf, $request->montonocturnasf, $request->cdiurnasf, $request->montodiurnasf, $request->fecha);

        return redirect()->route('home');

    }

    public function insertarHorasExtras($idEmpleado, $cantidadDiurnas, $montoDiurnas, $cantidaNocturnas, $montoNocturnas, $cantidaNocturnasFeriado, $montoNocturnasFeriado, $cantidadDiurnaFeriado, $montoDiurnasFeriado, $fecha)
    {
        $this->HorasExtras->id_empleado = $idEmpleado;
        $this->HorasExtras->cantidadDiurnas = $cantidadDiurnas;
        $this->HorasExtras->montoDiurnas = $montoDiurnas;
        $this->HorasExtras->cantidadNocturnas = $cantidaNocturnas;
        $this->HorasExtras->montoNocturnas = $montoNocturnas;
        $this->HorasExtras->cantidadNocturnasFeriado = $cantidaNocturnasFeriado;
        $this->HorasExtras->montoNocturnasFeriado = $montoNocturnasFeriado;
        $this->HorasExtras->cantidadDiurnasferiado = $cantidadDiurnaFeriado;
        $this->HorasExtras->montoDiurnasFeriado = $montoDiurnasFeriado;
        $this->HorasExtras->fecha = $fecha;
        $this->HorasExtras->save();
    }

    public function actualizarIncertarHoras($empleadoId, $cantidadDiurnas, $montoDiurnas, $cantidaNocturnas, $montoNocturnas, $cantidaNocturnasFeriado, $montoNocturnasFeriado, $cantidadDiurnaFeriado, $montoDiurnasFeriado, $fecha)
    {
        $mesActual = Carbon::now()->format('Y-m');

        $horasExtrasExistentes = HorasExtras::where('id_empleado', $empleadoId)->where('fecha', 'LIKE', $mesActual . '%')->first();

        if ($horasExtrasExistentes) {
            $horasExtrasExistentes->cantidadDiurnas += $cantidadDiurnas;
            //$horasExtrasExistentes->montoDiurnas += $montoDiurnas;
            $horasExtrasExistentes->cantidadNocturnas += $cantidaNocturnas;
            //$horasExtrasExistentes->montoNocturnas += $montoNocturnas;
            $horasExtrasExistentes->cantidadNocturnasFeriado += $cantidaNocturnasFeriado;
            //$horasExtrasExistentes->montoNocturnasFeriado += $montoNocturnasFeriado;
            $horasExtrasExistentes->cantidadDiurnasferiado += $cantidadDiurnaFeriado;
            //$horasExtrasExistentes->montoDiurnasFeriado += $montoDiurnasFeriado;
            $horasExtrasExistentes->save();

        }else{
            $this->insertarHorasExtras($empleadoId, $cantidadDiurnas, $montoDiurnas, $cantidaNocturnas, $montoNocturnas, $cantidaNocturnasFeriado, $montoNocturnasFeriado, $cantidadDiurnaFeriado, $montoDiurnasFeriado, $fecha);
        }
    
    }
}