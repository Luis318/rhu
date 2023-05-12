<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleados;

class empleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $empleados = [
            ['primerNombre' => 'Luis', 'segundoNombre' => 'Alonso', 'primerApellido' => 'Mendoza', 'segundoApellido' => 'Gonzalez', 'dui' => '98976567-8', 'salario_base' => 10000, 'fechaNacimiento' => '1996-10-05', 'fechaContratacion' => '2023-01-01', 'pasaporte' => 'A56756542', 'carnetResidencia' => '1267654', 'estadoCivil' => 'Soltero', 'sexo' => 'M', 'telefono' => '25367896', 'celular' => '76543234', 'estado' => 'Activo', 'email' => 'mail1@mail.com', 'areaPuesto_id' => 1], 
            ['primerNombre' => 'Sara', 'segundoNombre' => 'Elizabeht', 'primerApellido' => 'Monterrosa', 'segundoApellido' => 'Estrada', 'dui' => '87898632-1', 'salario_base' => 1000, 'fechaNacimiento' => '1996-12-08', 'fechaContratacion' => '2023-02-01', 'pasaporte' => 'BB7898654', 'carnetResidencia' => '9876567', 'estadoCivil' => 'Soltera', 'sexo' => 'F', 'telefono' => '29317796', 'celular' => '76231234', 'estado' => 'Activo', 'email' => 'mail2@mail.com', 'areaPuesto_id' => 3],
            ['primerNombre' => 'Juan', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '23452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo', 'email' => 'mail3@mail.com', 'areaPuesto_id' => 2],
        ];

        foreach($empleados as $empleado){
            Empleados::create($empleado);
        }
    }
}
