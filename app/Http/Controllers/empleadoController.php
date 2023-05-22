<?php

namespace App\Http\Controllers;

use App\Models\AreaPuestos;
use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class empleadoController extends Controller
{
    public function empleadosList(Request $request)
    {
        $data['empleados'] = DB::select("select * from empleados ORDER BY id DESC");
        return view('empleados\empleados-list',$data);
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
        $empleado->areaPuesto_id = $request->areaPuesto_id;
        $empleado->save();
        return redirect()->route("empleados-list");
    }

    public function empleadosView($id)
    {
        $data['empleado'] = DB::select("select empleados.primerNombre, empleados.segundoNombre,empleados.primerApellido,empleados.segundoApellido,empleados.dui,
        empleados.salario_base,empleados.fechaNacimiento,empleados.fechaContratacion,empleados.pasaporte,empleados.carnetResidencia,
        CASE empleados.estadoCivil WHEN 1 THEN 'Soltero'
        WHEN 2 THEN 'Divorciado'
        WHEN 3 THEN 'Viudo'
        WHEN 4 THEN 'Casado' END estadoCivil,
        CASE empleados.sexo WHEN 1 THEN 'Femenino'
        WHEN 2 THEN 'Masculino'
        WHEN 3 THEN 'Otro' END sexo,
        empleados.telefono,
        empleados.celular,
        empleados.email,
        area_puestos.area AS areaPuesto_id,
        empleados.puesto
        FROM empleados
        INNER JOIN area_puestos ON empleados.areaPuesto_id=area_puestos.id WHERE empleados.id=$id");
        return view('empleados\empleados-view',$data);
    }


}
