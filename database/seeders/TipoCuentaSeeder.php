<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoCuenta;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creando tipo de cuenta
        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Activo corriente';
        $tipoCuenta->rubro_id = 1;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Activo no corriente';
        $tipoCuenta->rubro_id = 1;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Pasivo corriente';
        $tipoCuenta->rubro_id = 2;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Pasivo no corriente';
        $tipoCuenta->rubro_id = 2;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Capital neto';
        $tipoCuenta->rubro_id = 3;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Gastos de operacion';
        $tipoCuenta->rubro_id = 4;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Ingresos de operacion';
        $tipoCuenta->rubro_id = 5;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Existencia en bodega';
        $tipoCuenta->rubro_id = 6;
        $tipoCuenta->save();

        $tipoCuenta = new TipoCuenta();
        $tipoCuenta->nombre = 'Emision de titulos valores';
        $tipoCuenta->rubro_id = 7;
        $tipoCuenta->save();
    } 
}
