<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\PrestacionesLaborales;
use Illuminate\Http\Request;
use DataTables;

class HorasController extends Controller
{
    protected $Empleados, $PrestacionesLaborales;
    public function __construct(Empleados $Empleados, PrestacionesLaborales $PrestacionesLaborales)
    {
        $this->Empleados = $Empleados;
        $this->PrestacionesLaborales = $PrestacionesLaborales;
    }
    public function index(Request $request)
    {   
        //dd($request);
        //dd($this->calcularIsss());
        if ($request->ajax()) {
            $data = Empleados::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){
   
                           $btn = '<a href="'.route('horas_extras', $row->id).'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';
    
                            return $btn;
                    })
                    ->addcolumn('salario_base', function($row){
                        return number_format($row->salario_base, 2, '.', ',');
                    })
                    ->addcolumn('primerNombre', function($row){
                        return $row->primerNombre.' '.$row->segundoNombre;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }
        return view('prestaciones.horasEmpleado');
    }

    public function viewHorasExtras($idEmpleado){
        $empleado = Empleados::find($idEmpleado);
        return view('prestaciones.horasExtras', compact('empleado'));
    }

    public function store(Request $request){

        if($request->monto_hed_descanso != null && $request->monto_hed_festivo == null ){

            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras diurnas en dia de descanso";
            $this->PrestacionesLaborales->monto = $request->monto_hed;
            $this->PrestacionesLaborales->horas_extra = $request->horasdiurnas;
            $this->PrestacionesLaborales->save();
        }elseif($request->monto_hed_descanso == null && $request->monto_hed_festivo != null){
            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras diurnas en dia Festivo";
            $this->PrestacionesLaborales->monto = $request->monto_hed;
            $this->PrestacionesLaborales->horas_extra = $request->horasdiurnas;
            $this->PrestacionesLaborales->save();
        }elseif($request->monto_hed_descanso == null && $request->monto_hed_festivo == null){
            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras diurnas en dia normal";
            $this->PrestacionesLaborales->monto = $request->monto_hed;
            $this->PrestacionesLaborales->horas_extra = $request->horasdiurnas;
            $this->PrestacionesLaborales->save();
        }elseif($request->monto_hen_descanso != null && $request->monto_hen_festivo == null){
            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras nocturnas en dia de descanso";
            $this->PrestacionesLaborales->monto = $request->monto_hen;
            $this->PrestacionesLaborales->horas_extra = $request->horasnocturnas;
            $this->PrestacionesLaborales->save();
        }elseif($request->monto_hen_descanso == null && $request->monto_hen_festivo != null){
            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras nocturnas en dia Festivo";
            $this->PrestacionesLaborales->monto = $request->monto_hen;
            $this->PrestacionesLaborales->horas_extra = $request->horasnocturnas;
            $this->PrestacionesLaborales->save();
        }elseif($request->monto_hen_descanso == null && $request->monto_hen_festivo == null){
            $this->PrestacionesLaborales->fechaPrestacion = $request->fecha;
            $this->PrestacionesLaborales->empleado_id = $request->empleado_id;
            $this->PrestacionesLaborales->prestacion = "Horas extras nocturnas en dia normal";
            $this->PrestacionesLaborales->monto = $request->monto_hen;
            $this->PrestacionesLaborales->horas_extra = $request->horasnocturnas;
            $this->PrestacionesLaborales->save();
        }

        return redirect()->route('home');

    }
}
