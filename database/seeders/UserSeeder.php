<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Empresa;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Creando superusuarios
        $user = new User();
        $user->name = "RM16034";
        $user->email = "rm16034@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("isaac34");
        $user->save();

        $user = new User();
        $user->name = "ML17018";
        $user->email = "ml17018@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("roxana18");
        $user->save();

        $user = new User();
        $user->name = "MG17032";
        $user->email = "mg17032@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("luis32");
        $user->save();

        $user = new User();
        $user->name = "RR16121";
        $user->email = "rr16121@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("carlos21");
        $user->save();

        $user = new User();
        $user->name = "BQ18002";
        $user->email = "bq18002@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("edwin02");
        $user->save();
    }
}
