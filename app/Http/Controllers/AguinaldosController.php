<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
use App\Models\PrestacionesLaborales;
use App\Models\Empleados;
use DataTables;

class AguinaldosController extends Controller
{
    public function index(Request $request)
    {
        //dd($request);
        //dd($this->calcularIsss());
        if ($request->ajax()) {
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
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('aguinaldos.aguinaldo');

    }
}