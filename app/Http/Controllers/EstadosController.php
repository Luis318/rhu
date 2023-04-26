<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\TipoCuenta;
use App\Models\Cuenta;
use App\Models\InformeContable;
use App\Models\DetalleCatalogo;
use Carbon\Carbon;
use Termwind\Components\Dd;

class EstadosController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
        $this->tipoCuenta = new TipoCuenta();
        $this->cuenta = new Cuenta();
        $this->periodo = new Periodo();
        $this->detalleCatalogo = new DetalleCatalogo();
        $this->informeContable = new InformeContable();
    }

    public function index()
    {
        $informes = $this->informeContable->informes();
        return view('estadosFinancieros/index', compact('informes'));
    }

    public function show(InformeContable $inf)
    {

        return view('estadosFinancieros/show', ['inf' => $inf]);
    }

    public function create()
    {
        $tipoCuenta = $this->tipoCuenta->cuentasBalance();
        $cuentasActivoC = $this->cuenta->cuentasActivo(1);
        $cuentasActivoNC = $this->cuenta->cuentasActivo(2);
        $cuentasPasivoC = $this->cuenta->cuentasPasivo(3);
        $cuentasPasivoNC = $this->cuenta->cuentasPasivo(4);
        $cuentasPatrimonio = $this->cuenta->cuentasPatrimonio();

        return view('estadosFinancieros/create', [
            'tipoCuenta' => $tipoCuenta, 
            'cuentasActivoC' => $cuentasActivoC,
            'cuentasActivoNC' => $cuentasActivoNC,
            'cuentasPasivoN' => $cuentasPasivoC,
            'cuentasPasivoNC' => $cuentasPasivoNC,
            'cuentasPatrimonio' => $cuentasPatrimonio
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Informe
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin    = $request->input('fechaFin');
        $tipoEstado  = $request->input('tipoEstado');
        $total       = $request->input('total');

        $informe = [
            'fecha_inicio' => $fechaInicio,
            'fecha_fin'    => $fechaFin,
            'tipo_informe' => $tipoEstado,
            'total_reporte' => $total,
        ];

        $this->informeContable->create($informe);
        $informe = $this->informeContable->ultimoIdRegistrado();
        $idInforme = $informe->id;
     
        $ultimoId = $this->cuenta->ultimoId();
        $periodo = 1;
        $empresa_id = auth()->user()->empresas_id;
        $monto = 0;

        for($i=1; $i<=$ultimoId; $i++){
            $monto = $request->input("monto_".$i);
            if($monto != null && empty($monto) == false){
                $detalleCatalogo = [
                    'periodos_id' => $periodo,
                    'empresas_id' => $empresa_id,
                    'cuentas_id'  => $i,
                    'monto_cuenta' => $monto,
                    'informecontable_id' => $idInforme
                ];
                $this->detalleCatalogo->create($detalleCatalogo);
            }
        }
        return redirect()->route('estados.index')->with('success', 'Estados importados exitosamente');   
    }
    
}