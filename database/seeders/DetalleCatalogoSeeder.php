<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetalleCatalogo;

class DetalleCatalogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $detalleCatalogo = new DetalleCatalogo();
        $detalleCatalogo->monto_cuenta = 700;
        $detalleCatalogo->cuentas_id = 1;
        $detalleCatalogo->empresas_id = 1;
        $detalleCatalogo->periodos_id = 1;
        $detalleCatalogo->save();

        $detalleCatalogo = new DetalleCatalogo();
        $detalleCatalogo->monto_cuenta = 700;
        $detalleCatalogo->cuentas_id = 2;
        $detalleCatalogo->empresas_id = 1;
        $detalleCatalogo->periodos_id = 2;
        $detalleCatalogo->save();

    }
}
