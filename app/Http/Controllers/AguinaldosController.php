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
        //dd($this->calcularAntiguedadEmpleados());
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
                ->addColumn('antiguedad', function ($row) use ($aniosTrabajados) {
                    return $aniosTrabajados[$row->id];
                })
                ->addColumn('aguinaldo', function ($row) use ($aguinaldos) {
                    return number_format($aguinaldos[$row->id], 2, '.', ',');
                })
                ->rawColumns(['acciones'])
                ->make(true);
        }
        return view('aguinaldos.aguinaldo');

    }

    public function calcularAntiguedadEmpleados()
    {
        $empleados = Empleados::all();
        $aniosTrabajados = [];

        foreach ($empleados as $empleado) {
            $fechaContratacion = Carbon::parse($empleado->fechaContratacion);
            $antiguedad = $fechaContratacion->diffInYears(Carbon::now()) . ' años';

            if ($antiguedad < 1) {
                $antiguedad = $fechaContratacion->diffInMonths(Carbon::now()) . ' meses';
                //dd($antiguedad);
            }
            $aniosTrabajados[$empleado->id] = $antiguedad;
        }
        return $aniosTrabajados;
    }

    public function calcularAguinaldos()
    {
        $empleados = Empleados::all();
        $aguinaldos = [];

        foreach ($empleados as $empleado) {
            $mesesTrabajados = $this->calcularMesesTrabajados($empleado->fechaContratacion);
            $aguinaldo = 0;

            if ($mesesTrabajados < 12) {
                $aguinaldo = ((($empleado->salario_base / 30) * 15)/365) * ($mesesTrabajados * 30);
            } elseif ($mesesTrabajados >= 12 && $mesesTrabajados < 36) {
                $aguinaldo = ($empleado->salario_base / 30) * 15;
            } elseif ($mesesTrabajados >= 36 && $mesesTrabajados < 120) {
                $aguinaldo = ($empleado->salario_base / 30) * 19;
            } elseif ($mesesTrabajados >= 120) {
                $aguinaldo = ($empleado->salario_base / 30) * 21;
            }

            $aguinaldos[$empleado->id] = $aguinaldo;
        }

        return $aguinaldos;
    }

    private function calcularMesesTrabajados($fechaContratacion)
    {
        $fechaContratacion = new \DateTime($fechaContratacion);
        $fechaActual = new \DateTime();

        $intervalo = $fechaContratacion->diff($fechaActual);
        $meses = ($intervalo->format('%y') * 12) + $intervalo->format('%m');

        return $meses;
    }

    //imprimir planilla de aguinaldos 
    public function generatePDF()
    {
        $empleados = Empleados::all();
        $aguinaldos = $this->calcularAguinaldos();

        //Para el nombre
        $fechaActual = date('d-m-Y');
        $nombreArchivo = 'aginaldos_' . $fechaActual . '.pdf';


        //crear nueva instancia de pdf
        $pdf = new TCPDF();
        //establecer el contenido del documento
        $html = view('pdf.planillaAguinaldos', compact('empleados', 'aguinaldos'))->render();

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

}