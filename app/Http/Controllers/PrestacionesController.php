<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use App\Models\PrestacionesLaborales;
use Illuminate\Http\Request;
use DataTables;

class PrestacionesController extends Controller
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
            $descuentos = $this->calcularIsss();
            $afp = $this->calcularAfp();
            $renta = $this->calculaRenta();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct"><i class="bi bi-eye-fill"></i></a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="bi bi-trash-fill"></i></a>';
    
                            return $btn;
                    })
                    ->addColumn('descuento_isss', function($row) use ($descuentos){
                        return number_format($descuentos[$row->id], 2,'.',',');
                    })
                    ->addColumn('descuento_afp', function($row) use ($afp){
                        return number_format($afp[$row->id], 2,'.',',');
                    })
                    ->addColumn('descuento_renta', function($row) use ($renta){
                        return number_format($renta[$row->id], 2,'.',',');
                    })
                    ->addcolumn('salario_base', function($row){
                        return number_format($row->salario_base, 2, '.', ',');
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }
        return view('prestaciones.salarios');
        
    }

    //Calcula el isss del empleado
    public function calcularIsss(){

        $salarios = $this->Empleados->getEmpleados();
        $descuentoIsss = [];

        foreach($salarios as $empleado){
            $descuento = $empleado->salario_base * 0.03;
            $descuentoIsss[$empleado->id] = $descuento;
            
        }

        return $descuentoIsss;
    }

    //calcula el afp del empleado
    public function calcularAfp(){
        $salarios = $this->Empleados->getEmpleados();
        $descuentoAfp = [];

        foreach($salarios as $empleado){
            $descuento = $empleado->salario_base * 0.0725;
            $descuentoAfp[$empleado->id]=$descuento;
        }
        return $descuentoAfp;
    }

    //calculo de la renta 
    public function calculaRenta(){
        $salarios = $this->Empleados->getEmpleados();
        $descuentoRenta = [];

        foreach($salarios as $empleado){
            if($empleado->salario_base >= 0.01 && $empleado->salario_base <= 487.60){
                $descuentoRenta[$empleado->id] = 0;
            }
            elseif($empleado->salario_base >= 487.61 && $empleado->salario_base <= 642.85){
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 487.60) * 0.1) + 17.48; 
            }
            elseif($empleado->salario_base >= 642.86 && $empleado->salario_base <= 915.81){
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 642.85) * 0.1) + 32.70;
            }
            elseif($empleado->salario_base >= 915.82 && $empleado->salario_base <= 2058.67){
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 915.81) * 0.2) + 60;
            }
            elseif($empleado->salario_base >= 2058.68){
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 2058.67) * 0.3) + 288.57;
            }
        }

        return $descuentoRenta;
    }
}
