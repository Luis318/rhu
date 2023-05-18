<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Indemnizaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndemnizacionController extends Controller
{
    //
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function indemnizacionList(Request $request)
    {
        $data['indeminzaciones'] = DB::select("select indemnizaciones.*, concat (empleados.primerNombre,' ', empleados.primerApellido) as nombreEmpleado FROM indemnizaciones
        INNER JOIN empleados ON indemnizaciones.id_empleado	= empleados.id
        ORDER BY indemnizaciones.id DESC");
        return view('indemnizaciones\indemnizacion-list', $data);
    }

    public function indemnizacionCreate()
    {
        $data['empleados'] = Empleados::all();
        return view('indemnizaciones\indemnizacion-create',$data);
    }

    public function indemnizacionStore(Request $request)
    {
        $empleado = Empleados::find($request->id_empleado);
        print($empleado);
        $indem = new Indemnizaciones;
        $indem->id_empleado = $request->id_empleado;
        $indem->categoria = $request->categoria;
        $indem->fecha_despido = $request->fecha_despido;
        $indem->descripcion = $request->descripcion;
        $indem->monto = $request->monto;
        $indem->save();
        return redirect()->route("indemnizacion-list");
    }

    public function indemnizacionView($id)
    {
        $data['indeminzacion'] = DB::select("select indemnizaciones.fecha_despido,indemnizaciones.monto,indemnizaciones.descripcion, concat (empleados.primerNombre,' ', empleados.primerApellido) as nombreEmpleado,
        empleados.salario_base,empleados.fechaContratacion,CASE
        WHEN indemnizaciones.categoria = 1 then 'Despido Injustificado'
        WHEN indemnizaciones.categoria = 2 then 'Renuncia voluntaria' end as categoriaNombre
        FROM indemnizaciones
        INNER JOIN empleados ON indemnizaciones.id_empleado	= empleados.id
        WHERE indemnizaciones.id=$id");
        return view('indemnizaciones\indemnizacion-view',$data);
    }

}
