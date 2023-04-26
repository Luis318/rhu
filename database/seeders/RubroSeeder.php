<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rubro;
use Database\Seeders\TipoCuentaSeeder;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $rubro = new Rubro();
        $rubro->nombre = 'Activo';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Pasivo';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Patrimonio';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Egresos';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Ingresos';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Cuentas de orden deudoras';
        $rubro->save();

        $rubro = new Rubro();
        $rubro->nombre = 'Cuentas de orden acreedoras';
        $rubro->save();
    }
}
