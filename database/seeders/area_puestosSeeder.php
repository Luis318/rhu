<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaPuestos;

class area_puestosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas =[
            ['area' => 'Area1', 'cargo' => 'Cargo1', 'jefeInmediato' => 'jefe1'],
            ['area' => 'Area2', 'cargo' => 'Cargo2', 'jefeInmediato' => 'jefe2'],
            ['area' => 'Area3', 'cargo' => 'Cargo3', 'jefeInmediato' => 'jefe3']
        ];

        foreach($areas as $area){
            AreaPuestos::create($area);
        }
    }
}
