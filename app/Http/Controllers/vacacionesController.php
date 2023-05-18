<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\PrestacionesLaborales;
use App\Models\vacaciones;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use DataTables;

class vacacionesController extends Controller
{

    public function vacacionesList(Request $request)
    {
        if($request->ajax()){
            $data['vacaciones'] = DB::select("select vacaciones.*, concat (empleados.primerNombre,' ', empleados.primerApellido) as nombreEmpleado FROM vacaciones
            INNER JOIN empleados ON vacaciones.id_empleado	= empleados.id
            ORDER BY vacaciones.id DESC");

            return Datatables::of($data['vacaciones'])
            ->addIndexColumn()
            ->addColumn('acciones', function($row){
                $btn = '<a href="' . route('vacaciones-view',$row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-plus-square"></i></a>';

                return $btn;
            })
            ->addcolumn('monto', function($row){
                return number_format($row->monto, 2, '.', ',');
            })
            ->rawColumns(['acciones'])
            ->make(true);

        }
        return view('vacaciones\vacaciones-list');
    }

    public function vacacionesCreate()
    {
        $data['empleados'] = Empleados::all();
        return view('vacaciones\vacaciones-create',$data);
    }

    public function vacacionesStore(Request $request)
    {
        $empleado = Empleados::find($request->id_empleado);
        $vacacion = new Vacaciones;
        $vacacion->id_empleado = $request->id_empleado;
        $vacacion->fechaInicio = $request->fechaInicio;
        $vacacion->fechaFin = $request->fechaFin;
        $vacacion->monto = $request->monto;
        $vacacion->tipo = $request->tipo;
        $vacacion->diasTrabajados = $request->diasTrabajados;
        $vacacion->descripcion = $request->descripcion;
        $vacacion->save();
        return redirect()->route("vacaciones-list");
    }

    public function vacacionesView($id)
    {
        $data['vacaciones'] = DB::select("select vacaciones.*, concat (empleados.primerNombre,' ', empleados.primerApellido) as nombreEmpleado,
        empleados.salario_base,empleados.fechaContratacion,CASE
        WHEN vacaciones.tipo = '1' then 'Completa'
        WHEN vacaciones.tipo = '2' then 'Proporcional' end as tipoNombre
        FROM vacaciones
        INNER JOIN empleados ON vacaciones.id_empleado	= empleados.id
        WHERE vacaciones.id=$id");
        return view('vacaciones\vacaciones-view',$data);
    }

    public function vacacionesUpdate($id)
    {
        $data['empleados'] = Empleados::all();
        return view('vacaciones\vacaciones-update',$data);
    }

    public function vacacionesStoreUpdate(Request $request,$id)
    {
        $empleado = Empleados::find($request->id_empleado);
        $vacacion = new Vacaciones;
        $vacacion->id_empleado = $request->id_empleado;
        $vacacion->fechaInicio = $request->fechaInicio;
        $vacacion->fechaFin = $request->fechaFin;
        $vacacion->monto = $request->monto;
        $vacacion->tipo = $request->tipo;
        $vacacion->diasTrabajados = $request->diasTrabajados;
        $vacacion->descripcion = $request->descripcion;
        $vacacion->update($id);
        return redirect()->route("vacaciones-list");
    }
}
