<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformeContable;

class InformeContableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $informeContable = new InformeContable();
        $informeContable->fecha_inicio = '2022-01-01';
        $informeContable->fecha_fin = '2022-01-31';
        $informeContable->tipo_informe = 1;
        $informeContable->total_reporte = 700;
        $informeContable->detallecatalogo_id = 1;
        $informeContable->rubro_id = 1;
        $informeContable->save();

        $informeContable = new InformeContable();
        $informeContable->fecha_inicio = '2022-02-01';
        $informeContable->fecha_fin = '2022-02-27';
        $informeContable->tipo_informe = 2;
        $informeContable->total_reporte = 700;
        $informeContable->detallecatalogo_id = 1;
        $informeContable->rubro_id = 2;
        $informeContable->save();

        $informeContable = new InformeContable();
        $informeContable->fecha_inicio = '2022-01-01';
        $informeContable->fecha_fin = '2022-01-31';
        $informeContable->tipo_informe = 2;
        $informeContable->total_reporte = 800;
        $informeContable->detallecatalogo_id = 1;
        $informeContable->rubro_id = 2;
        $informeContable->save();
    }
}
