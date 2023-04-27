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
        $user->name = "AP17012";
        $user->email = "ap17012@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("ap17012");
        $user->save();

        $user = new User();
        $user->name = "AM17004";
        $user->email = "am17004@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("am17004");
        $user->save();

        $user = new User();
        $user->name = "MG17032";
        $user->email = "mg17032@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("luis32");
        $user->save();

        $user = new User();
        $user->name = "MP17001";
        $user->email = "mp17001@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("mp17001");
        $user->save();

        $user = new User();
        $user->name = "BQ18002";
        $user->email = "bq18002@ues.edu.sv";
        $user->rol = 0;
        $user->password = Hash::make("edwin02");
        $user->save();
    }
}
