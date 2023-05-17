<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\PrestacionesLaborales;
use App\Models\HorasExtras;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use Elibyy\TCPDF\Facades\TCPDF;

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
                ->addColumn('acciones', function ($row) {

                    $btn = '<a href="' . route('boleta_empleado', $row->id) . '" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm editProduct"><i class="bi bi-plus-square"></i></a>';

                    //    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct"><i class="bi bi-trash-fill"></i></a>';
    
                    return $btn;
                })
                ->addColumn('descuento_isss', function ($row) use ($descuentos) {
                    return number_format($descuentos[$row->id], 2, '.', ',');
                })
                ->addColumn('descuento_afp', function ($row) use ($afp) {
                    return number_format($afp[$row->id], 2, '.', ',');
                })
                ->addColumn('descuento_renta', function ($row) use ($renta) {
                    return number_format($renta[$row->id], 2, '.', ',');
                })
                ->addcolumn('salario_base', function ($row) {
                    return number_format($row->salario_base, 2, '.', ',');
                })
                ->addcolumn('primerNombre', function ($row) {
                    return $row->primerNombre . ' ' . $row->segundoNombre;
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('prestaciones.salarios');

    }

    //Calcula el isss del empleado
    public function calcularIsss()
    {

        $salarios = $this->Empleados->getEmpleados();
        if ($salarios == null) {
            return null;
        }
        $descuentoIsss = [];

        foreach ($salarios as $empleado) {
            $descuento = $empleado->salario_base * 0.03;
            $descuentoIsss[$empleado->id] = $descuento;

        }

        return $descuentoIsss;
    }

    //calcular ISSS del patrono
    public function calcularIsssPatrono()
    {
        $salarios = $this->Empleados->getEmpleados();
        if ($salarios == null) {
            return null;
        }
        $descuentoIsssPatrono = [];

        foreach ($salarios as $empleado) {
            $descuento = $empleado->salario_base * 0.075;
            $descuentoIsssPatrono[$empleado->id] = $descuento;
        }

        return $descuentoIsssPatrono;
    }

    //calcula el afp del empleado
    public function calcularAfp()
    {
        $salarios = $this->Empleados->getEmpleados();
        if ($salarios == null) {
            return null;
        }
        $descuentoAfp = [];

        foreach ($salarios as $empleado) {
            $descuento = $empleado->salario_base * 0.0725;
            $descuentoAfp[$empleado->id] = $descuento;
        }
        return $descuentoAfp;
    }

    //calcula el afp del patrono
    public function calcularAfpPatrono()
    {
        $salarios = $this->Empleados->getEmpleados();
        if ($salarios == null) {
            return null;
        }
        $descuentoAfpPatrono = [];

        foreach ($salarios as $empleado) {
            $descuento = $empleado->salario_base * 0.0775;
            $descuentoAfpPatrono[$empleado->id] = $descuento;
        }
        return $descuentoAfpPatrono;
    }

    //calculo de la renta 
    public function calculaRenta()
    {
        $salarios = $this->Empleados->getEmpleados();
        if ($salarios == null) {
            return null;
        }
        $descuentoRenta = [];

        foreach ($salarios as $empleado) {
            if ($empleado->salario_base >= 0.01 && $empleado->salario_base <= 487.60) {
                $descuentoRenta[$empleado->id] = 0;
            } elseif ($empleado->salario_base >= 487.61 && $empleado->salario_base <= 642.85) {
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 487.60) * 0.1) + 17.48;
            } elseif ($empleado->salario_base >= 642.86 && $empleado->salario_base <= 915.81) {
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 642.85) * 0.1) + 32.70;
            } elseif ($empleado->salario_base >= 915.82 && $empleado->salario_base <= 2058.67) {
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 915.81) * 0.2) + 60;
            } elseif ($empleado->salario_base >= 2058.68) {
                $descuentoRenta[$empleado->id] = (($empleado->salario_base - 2058.67) * 0.3) + 288.57;
            }
        }

        return $descuentoRenta;
    }

    /****************Boletas de pago*****************/
    public function verBoleta($idEmpleado)
    {
        $nocturnasF = $this->calcularHorasExtrasNocturnasFeriado();
        $diurnasF = $this->calcularHorasExtrasDiurnasFeriado();
        $nocturnas =$this->calcularHorasExtrasNocturnas();
        $diurnas = $this->calcularHorasExtrasDiurnas();

        $mesActual = Carbon::now()->format('Y-m');

        $horasExtrasExistentes = HorasExtras::where('id_empleado', $idEmpleado)->where('fecha', 'LIKE', $mesActual . '%')->first();

        //dd($horasExtrasExistentes);

        $empleado = Empleados::find($idEmpleado);
        $horas = PrestacionesLaborales::where('empleado_id', $idEmpleado)->get();
        $isssEmp = $this->calcularIsss();
        $issPatrono = $this->calcularIsssPatrono();
        $afpEmp = $this->calcularAfp();
        $afpPatrono = $this->calcularAfpPatrono();
        $renta = $this->calculaRenta();
        return view('boletaspago.boletaEmpleado', compact('empleado', 'horas', 'isssEmp', 'afpEmp', 'renta', 'issPatrono', 'afpPatrono', 'horasExtrasExistentes', 'nocturnasF', 'diurnasF', 'nocturnas', 'diurnas'));
    }

    /***********************Horas extras*************************/
    // public function viewHorasExtras(){
    //     $empleados = Empleados::all();
    //     return view('prestaciones.horasExtras',['empleados'=>$empleados]);
    // }

    /***Generar PDF de la planilla***/
    public function generatePDF()
    {
        $empleados = Empleados::all();
        $isssEmp = $this->calcularIsss();
        $afpEmp = $this->calcularAfp();
        $renta = $this->calculaRenta();

        //Para el nombre
        $fechaActual = date('d-m-Y');
        $nombreArchivo = 'planilla_' . $fechaActual . '.pdf';


        //crear nueva instancia de pdf
        $pdf = new TCPDF();
        //establecer el contenido del documento
        $html = view('pdf.planilla', compact('empleados', 'isssEmp', 'afpEmp', 'renta'))->render();

        $pdf::SetPageOrientation('L');

        //establecer la configuracion del documento PDF
        $pdf::SetCreator('Tu Aplicacion');
        $pdf::SetAuthor('Tu Nombre');
        $pdf::SetTitle('Reporte de Empleados');
        $pdf::SetHeaderData('', '', 'Datos de empleados', '');

        //Agregar una nueva pagina
        $pdf::AddPage();

        //escribir el contenido HTML en el PDF
        $pdf::writeHTML($html, true, false, true, false, '');

        //generar y descargar el archivo pdf
        $pdf::Output($nombreArchivo, 'D');
    }

    //Generar PDF de la boleta de pago
    public function boletasMultiples()
    {
        $isss = [];
        $afp = [];
        $renta = [];

        // Obtén los datos de los empleados desde tu fuente de datos (por ejemplo, una base de datos)
        $empleados = Empleados::all();

        // Crea una nueva instancia de TCPDF
        $pdf = new TCPDF();

        // Recorre los empleados y agrega una página para cada uno
        foreach ($empleados as $empleado) {

            $isss = $this->calcularIsss();
            //dd($isss[$empleado->id]);
            $afp = $this->calcularAfp();
            $renta = $this->calculaRenta();
            $totalPagar = $this->calcularSalario();
            $diurnas = $this->calcularHorasExtrasDiurnas();
            $nocturnas = $this->calcularHorasExtrasNocturnas();
            $diurnasF = $this->calcularHorasExtrasDiurnasFeriado();
            $nocturnasF = $this->calcularHorasExtrasNocturnasFeriado();

            //dd($empleado->id);
            // Agrega una nueva página
            $pdf::AddPage();

            // Establece el contenido HTML para el empleado actual
            $html = '<div style="text-align: center;">';
            $html .= '<h1>Empresa RHU115</h1>';
            $html .= '<h2>Boleta de pago de ' . $empleado->primerNombre . '</h2>';
            $html .= '<h3>Informacion del empleado</h3>';
            $html .= '<ul>';
            $html .= '<li><strong>Nombre: </strong>' . $empleado->primerNombre . ' ' . $empleado->segundoNombre . ' ' . $empleado->primerApellido . ' ' . $empleado->segundoApellido . '</li>';
            $html .= '<li><strong>DUI: </strong>' . $empleado->dui . '</li>';
            $html .= '<li><strong>Salario base: </strong>' . number_format($empleado->salario_base,2,'.',',') . '</li>';
            $html .= '<li><strong>Email: </strong>' . $empleado->email . '</li>';
            $html .= '<br>';
            $html .= '</ul>';
            $html .= '<h3>retenciones laborales</h3>';
            $html .= '<ul>';

            if (isset($isss[$empleado->id])) {
                $html .= '<li><strong>ISSS: </strong>' . number_format($isss[$empleado->id],2,'.',',') . '</li>';
            }
            if (isset($afp[$empleado->id])) {
                $html .= '<li><strong>AFP: </strong>' . number_format($afp[$empleado->id],2,'.',','). '</li>';
            }
            if (isset($renta[$empleado->id])) {
                $html .= '<li><strong>Renta: </strong>' . number_format($renta[$empleado->id], 2,'.',',') . '</li>';
            }
           
            $html .= '</ul>';
            $html .= '<h3>Horas extras</h3>';
            $html .= '<ul>';

            if (isset($diurnas[$empleado->id])) {
                $html .= '<li><strong>Horas diurnas: </strong>' . number_format($diurnas[$empleado->id],2,'.',',') . '</li>';
            }
            if (isset($nocturnas[$empleado->id])) {
                $html .= '<li><strong>Horas nocturnas: </strong>' . number_format($nocturnas[$empleado->id],2,'.',',' ). '</li>';
            }
            if (isset($diurnasF[$empleado->id])) {
                $html .= '<li><strong>Horas diurnas (Feriado): </strong>' . number_format($diurnasF[$empleado->id],2,'.',',') . '</li>';
            }
            if (isset($nocturnasF[$empleado->id])) {
                $html .= '<li><strong>Horas nocturnas (Feriado): </strong>' .number_format($nocturnasF[$empleado->id],2,'.',',') . '</li>';
            }
           
            $html .= '</ul>';

            $html .= '<p><strong>Total a pagar: </strong>' . number_format($totalPagar[$empleado->id],2,'.',',' ). '</p>';


            // Escribe el contenido HTML en la página actual
            $pdf::writeHTML($html, true, false, true, false);
        }

        // Genera el contenido del PDF
        $pdfContent = $pdf::Output('', 'D');

        // Devuelve el PDF al navegador
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="empleados.pdf"'
        ]);
    }

    public function calcularSalario(){
        $empleados = Empleados::all();
        $horas = PrestacionesLaborales::all();
        $isssEmp = $this->calcularIsss();
        $afpEmp = $this->calcularAfp();
        $renta = $this->calculaRenta();
        $diurnas = $this->calcularHorasExtrasDiurnas();
        $nocturnas = $this->calcularHorasExtrasNocturnas();
        $diurnasF = $this->calcularHorasExtrasDiurnasFeriado(); 
        $nocturnasF = $this->calcularHorasExtrasNocturnasFeriado();
        $salario = [];
        foreach($empleados as $empleado){
            $salario[$empleado->id] = $empleado->salario_base - $isssEmp[$empleado->id] - $afpEmp[$empleado->id] - $renta[$empleado->id] + $diurnas[$empleado->id] + $nocturnas[$empleado->id] + $diurnasF[$empleado->id] + $nocturnasF[$empleado->id];
        }
        return $salario;
    }

    //calcular horas extras diurnas
    public function calcularHorasExtrasDiurnas(){
        $empleados = Empleados::all();
        $horas = HorasExtras::all();
        $horasExtras = [];
        foreach($empleados as $empleado){
            $horasExtras[$empleado->id] = 0;
        }
        foreach($horas as $hora){
            $horasExtras[$hora->id_empleado] = $hora->cantidadDiurnas * $hora->montoDiurnas;
        }
        //dd($horasExtras);
        return $horasExtras;
    }

    //calcular horas extras nocturnas
    public function calcularHorasExtrasNocturnas(){
        $empleados = Empleados::all();
        $horas = HorasExtras::all();
        $horasExtras = [];
        foreach($empleados as $empleado){
            $horasExtras[$empleado->id] = 0;
        }
        foreach($horas as $hora){
            $horasExtras[$hora->id_empleado] = $hora->cantidadNocturnas * $hora->montoNocturnas;
        }
        //dd($horasExtras);
        return $horasExtras;
    }

    //calcular horas extras diurnas feriado
    public function calcularHorasExtrasDiurnasFeriado(){
        $empleados = Empleados::all();
        $horas = HorasExtras::all();
        $horasExtras = [];
        foreach($empleados as $empleado){
            $horasExtras[$empleado->id] = 0;
        }
        foreach($horas as $hora){
            $horasExtras[$hora->id_empleado] = $hora->cantidadDiurnasFeriado * $hora->montoDiurnasFeriado;
        }
        //dd($horasExtras);
        return $horasExtras;
    }

    //calcular horas extras nocturnas feriado
    public function calcularHorasExtrasNocturnasFeriado(){
        $empleados = Empleados::all();
        $horas = HorasExtras::all();
        $horasExtras = [];
        foreach($empleados as $empleado){
            $horasExtras[$empleado->id] = 0;
        }
        foreach($horas as $hora){
            $horasExtras[$hora->id_empleado] = $hora->cantidadNocturnasFeriado * $hora->montoNocturnasFeriado;
        }
        //dd($horasExtras);
        return $horasExtras;
    }
}