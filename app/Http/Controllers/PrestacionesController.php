<?php

namespace App\Http\Controllers;
use App\Models\Empleados;
use Illuminate\Http\Request;
use DataTables;

class PrestacionesController extends Controller
{
    public function index(Request $request)
    {   
        //dd($request);
        if ($request->ajax()) {
            $data = Empleados::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acciones', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
        }
        return view('prestaciones.salarios');
        
    }
}
