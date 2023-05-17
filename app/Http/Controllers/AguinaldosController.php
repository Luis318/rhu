<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\PrestacionesLaborales;
use App\Models\Empleados;
use Carbon\Carbon;
use DataTables;

class AguinaldosController extends Controller
{
    public function index(Request $request)
    {
        //dd($request);
        //dd($this->calcularIsss());
        //dd($this->calcularAntiguedadEmpleados());
        //dd($this->calcularAguinaldos());
        if ($request->ajax()) {
            $aniosTrabajados = $this->calcularAntiguedadEmpleados();
            $aguinaldos = $this->calcularAguinaldos();
            
            $data = Empleados::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('acciones', function ($row) {

                    $btn = '<a href="" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-plus-square"></i></a>';

                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="bi bi-trash-fill"></i></a>';
    
                    return $btn;
                })
                ->addcolumn('salario_base', function ($row) {
                    return number_format($row->salario_base, 2, '.', ',');
                })
                ->addcolumn('primerNombre', function ($row) {
                    return $row->primerNombre . ' ' . $row->segundoNombre;
                })
                ->addColumn('fechaContratacion', function ($row) {
                    return $row->fechaContratacion;
                })
                ->addColumn('antiguedad', function ($row) use($aniosTrabajados) {
                    return $aniosTrabajados[$row->id];
                })
                ->addColumn('aguinaldo', function ($row) use($aguinaldos) {
                    return number_format($aguinaldos[$row->id], 2, '.', ',');
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('aguinaldos.aguinaldo');

    }

    public function calcularAntiguedadEmpleados(){
        $empleados = Empleados::all();
        $aniosTrabajados = [];

        foreach($empleados as $empleado){
            $fechaContratacion = Carbon::parse($empleado->fechaContratacion);
            $aniosTrabajados[$empleado->id] = $fechaContratacion->diffInYears(Carbon::now());
        }
        return $aniosTrabajados;
    }

    public function calcularAguinaldos(){
        $empleados = Empleados::all();
        $aguinaldos = [];
        //$aniosTrabajados = $this->calcularAntiguedadEmpleados();

        foreach($empleados as $empleado){

            $aniosTrabajados[$empleado->id] = $this->calcularAntiguedadEmpleados();
            if($aniosTrabajados[$empleado->id] > 1 && $aniosTrabajados[$empleado->id] < 3){
                $pago = ($empleado->salario_base/30) * 15;
                $aguinaldos[$empleado->id] = $pago;
            }elseif($aniosTrabajados[$empleado->id] > 3 && $aniosTrabajados[$empleado->id] < 10){
                $pago = ($empleado->salario_base/30) * 19;
                $aguinaldos[$empleado->id] = $pago;
            }elseif($aniosTrabajados[$empleado->id] > 10){
                $pago = ($empleado->salario_base/30) * 21;
                $aguinaldos[$empleado->id] = $pago;
            }

        }
        return $aguinaldos;
    }

}