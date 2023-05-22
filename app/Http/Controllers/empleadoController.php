<?php

namespace App\Http\Controllers;

use App\Models\AreaPuestos;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class empleadoController extends Controller
{
    public function empleadosList(Request $request)
    {
        if($request->ajax()){
            $data['empleados'] = DB::select("select * from empleados ORDER BY id DESC");
            return Datatables::of($data['empleados'])
            ->addIndexColumn()
            ->addColumn('acciones', function ($row) {

                $btn = '<a href="' . route('empleados-view', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';

                return $btn;
            })
            ->addcolumn('salario_base', function ($row) {
                return number_format($row->salario_base, 2, '.', ',');
            })
            ->addcolumn('primerNombre', function ($row) {
                return $row->primerNombre . ' ' . $row->segundoNombre;
            })
            ->addcolumn('primerApellido', function ($row) {
                return $row->primerApellido . ' ' . $row->segundoApellido;
            })
            ->rawColumns(['acciones'])
            ->make(true);
        }
        return view('empleados\empleados-list');
    }

    public function empleadosCreate()
    {
        $data['areas'] = AreaPuestos::all();
        return view('empleados\empleados-create',$data);
    }

    public function empleadosStore(Request $request)
    {
        print($request->salario_base);
        $empleado = new Empleados;
        $empleado->primerNombre = $request->primerNombre;
        $empleado->segundoNombre = $request->segundoNombre;
        $empleado->primerApellido = $request->primerApellido;
        $empleado->segundoApellido = $request->segundoApellido;
        $empleado->dui = $request->dui;
        $empleado->salario_base = $request->salario_base;
        $empleado->fechaNacimiento = $request->fechaNacimiento;
        $empleado->fechaContratacion = $request->fechaContratacion;
        $empleado->pasaporte = $request->pasaporte;
        $empleado->carnetResidencia = $request->carnetResidencia;
        $empleado->estadoCivil = $request->estadoCivil;
        $empleado->sexo = $request->sexo;
        $empleado->telefono = $request->telefono;
        $empleado->celular = $request->celular;
        $empleado->estado = 'A';
        $empleado->puesto = $request->puesto;
        $empleado->email = $request->email;
        $empleado->save();
        return redirect()->route("empleados-list");
    }

    public function empleadosView($id)
    {
        $data['empleado'] = Empleados::find($id);
        return view('empleados\empleados-view',$data);
    }


}
