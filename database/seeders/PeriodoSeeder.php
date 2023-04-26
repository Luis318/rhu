<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Periodo;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $periodo = new Periodo();
        $periodo->anio = '2021-01-01';
        $periodo->save();

        $periodo = new Periodo();
        $periodo->anio = '2020-01-01';
        $periodo->save();

        $periodo = new Periodo();
        $periodo->anio = '2019-01-01';
        $periodo->save();
    }
}
