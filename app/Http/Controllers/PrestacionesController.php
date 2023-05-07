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
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->addColumn('descuento_isss', function($row) use ($descuentos){
                        return number_format($descuentos[$row->id], 2,'.','');
                    })
                    ->addColumn('descuento_afp', function($row) use ($afp){
                        return number_format($afp[$row->id], 2,'.','');
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
}
