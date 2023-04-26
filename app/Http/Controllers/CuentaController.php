<?php

namespace App\Http\Controllers;
use App\Models\Cuenta;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    public function index()
   {
    $data['cuentas'] = Cuenta::select('*')->get();
//    $dato = Cuenta::all();
    return view('cuenta.cuenta',$data//, compact('dato')
    );
   }

   public function getCuentaDetails($empid = 0){

    $cuenta = Cuenta::find($empid);
    $tipoCuenta =TipoCuenta::find($cuenta->tipocuentas_id);

    $html = "";
    if(!empty($cuenta)){
       $html = "<tr>
            <td width='30%'><b>ID:</b></td>
            <td width='70%'> ".$cuenta->id."</td>
         </tr>
         <tr>
            <td width='30%'><b>Nombre:</b></td>
            <td width='70%'> ".$cuenta->nombre."</td>
         </tr>
         <tr>
            <td width='30%'><b>Nomenclatura:</b></td>
            <td width='70%'> ".$cuenta->nomenclatura."</td>
         </tr>
         <tr>
            <td width='30%'><b>Cuenta:</b></td>
            <td width='70%'> ".$tipoCuenta->nombre."</td>
         </tr>";
    }
    $response['html'] = $html;

    return response()->json($response);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required',
            'nomenclatura' => 'required',
            'tipocuentas_id' => 'required',
        ]);

        $emps = new Cuenta;
        $emps->nombre = $request->input('nombre');
        $emps->nomenclatura = $request->input('nomenclatura');
        $emps->tipocuentas_id = $request->input('tipocuentas_id');

        $emps->save();
        return redirect('/cuenta')->with('success', 'Data saved');



    }

    public function Create()
    {
        $tiposCuentas = TipoCuenta::all();
        return view('cuenta.create', compact('tiposCuentas'));

    }

}
