<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

     protected $fillable = [
        'nombre',
        'nomenclatura',
        'tipocuentas_id'
    ];

    public function cuentasBalanceGen()
    {
        $cuentas = DB::table('cuentas')
        ->join('tipo_cuentas', 'cuentas.tipocuentas_id', '=', 'tipo_cuentas.id')
        ->select('cuentas.*', 'tipo_cuentas.nombre as tipoCuenta')
        ->where('tipo_cuentas.id','<',6)
        ->get();

        return $cuentas;
    }

    public function cuentasActivo($tipo)
    {
        $cuentas = DB::table('cuentas')
        ->join('tipo_cuentas', 'cuentas.tipocuentas_id', '=', 'tipo_cuentas.id')
        ->select('cuentas.*', 'tipo_cuentas.nombre as tipoCuenta')
        ->where('tipo_cuentas.id', $tipo)
        ->get();

        return $cuentas;
    }

    public function cuentasPasivo()
    {
        $cuentas = DB::table('cuentas')
        ->join('tipo_cuentas', 'cuentas.tipocuentas_id', '=', 'tipo_cuentas.id')
        ->select('cuentas.*', 'tipo_cuentas.nombre as tipoCuenta')
        ->where('tipo_cuentas.id','>',2)
        ->where('tipo_cuentas.id','<',5)

        ->get();

        return $cuentas;
    }

    public function cuentasPatrimonio()
    {
        $cuentas = DB::table('cuentas')
        ->join('tipo_cuentas', 'cuentas.tipocuentas_id', '=', 'tipo_cuentas.id')
        ->select('cuentas.*', 'tipo_cuentas.nombre as tipoCuenta')
        ->where('tipo_cuentas.id',5)
        ->get();

        return $cuentas;
    }

    public function ultimoID()
    {
        $cuentas = DB::table('cuentas')->latest('id')->first();
        $ultimoID = $cuentas->id;
        return $ultimoID;
    }

}
