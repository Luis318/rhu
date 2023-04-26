<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rubro;
use App\Models\Periodo;
use App\Models\DetalleCatalogo;
use App\Models\Cuenta;
use App\Models\Empresa;
use App\Models\TipoCuenta;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cuenta = new Cuenta();
        $cuenta->nombre = 'Efectivo';
        $cuenta->nomenclatura = '1101';
        $cuenta->tipocuentas_id = 1;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->nombre = 'Cuentas por cobrar a largo plazo';
        $cuenta->nomenclatura = '1201';
        $cuenta->tipocuentas_id = 2;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->nombre = 'Cuentas por pagar a largo plazo';
        $cuenta->nomenclatura = '2201';
        $cuenta->tipocuentas_id = 3;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->nombre = 'Cuentas por pagar';
        $cuenta->nomenclatura = '2101';
        $cuenta->tipocuentas_id = 4;
        $cuenta->save();

        $cuenta = new Cuenta();
        $cuenta->nombre = 'Capital Social';
        $cuenta->nomenclatura = '3101';
        $cuenta->tipocuentas_id = 5;
        $cuenta->save();
    }
}
