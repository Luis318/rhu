<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analisis;
use App\Models\Cuenta;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Object_;
use SebastianBergmann\Type\ObjectType;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

class AnalisisController extends Controller
{
    public function ver1(){
        // $analisis = new Analisis();
        // $datos = $analisis->recuperarCuentas(1,1);
        //$periodo1 = $analisis->recuperarCuentas(1,2);
        //$datos = $this->calcularHorizontal();
        //dd($datos);
        // $tipo = gettype($periodo1);
        //return view('analisis', compact('datos', 'tipo', 'periodo1'));
        
    }
    //calcula analisis horizontal
    public function ver(Request $request){
        $analisis = new Analisis();
        // for($i=0;$i<$analisis->conteo(1,1);$i++) {
            $empresa_id = auth()->user()->empresas_id;
            $periodo1 = $request->get('periodo1');
            $periodo2 = $request->get('periodo2');
            //dd($periodo1);
            $datos1 = $analisis->recuperarCuentas($empresa_id,1);
            $datos2 = $analisis->recuperarCuentas($empresa_id,2);
            
            //$this->redirectMetodo();
            
            $totalActivos = $analisis->totalActivos(1, 1, 1);
            $totalPasivos = $analisis->totalActivos(2, 1, 1);
            $totalCapital = $analisis->totalActivos(3, 1, 1);
        $periodo1 = (Array) $datos1;
        $periodo2 = (Array) $datos2;
        $resultado = array();
        foreach ($datos1 as $key1 => $value1) {
            foreach($datos2 as $key2 => $value2){
                if($key1 == $key2){
                    
                    $iteracion = ['monto_cuenta1' => $value1->monto_cuenta,
                                    'monto_cuenta2' => $value2->monto_cuenta,
                                        'nombre' => $value1->nombre,
                                        'cuentas_id' => $value1->cuentas_id,
                                        'ahr' => $l = $value1->monto_cuenta - $value2->monto_cuenta,
                                        'ahP' => ($l / $value1->monto_cuenta)*100,
                                        'av' => $analisis->analisisVertical($value1->monto_cuenta,$value1->tipocuentas_id,$totalActivos,$totalPasivos,$totalCapital),
                                         
            ];
                    //$resultado['monto_cuenta'] = $value1->monto_cuenta - $value2->monto_cuenta;
                }
            }
            array_push($resultado, $iteracion);
            //return view('analisis')->with('datos', $resultado);
        }
    
        return view('analisis')->with('datos', $resultado);
    }

    public function mostrarPeriodo(){
        
        return view('analisisPeriodo'); 
    }

    public function per(Request $request){
        $periodo1 = $request->input('periodo1');
        $periodo2 = $request->input('periodo2');
        //dd($periodo1);
        return redirect('analisis');
    }

    public function analisisVertical(){
        $analisis = new Analisis();
        $totalActivos = $analisis->totalActivos(1,1,1);

        return view('analisis')->with('activos', $totalActivos);
    }

    public function redirectMetodo(){
        return redirect()->route('analisis');
    }

}
