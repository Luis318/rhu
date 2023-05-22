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
            ['primerNombre' => 'Luis', 'segundoNombre' => 'Alonso', 'primerApellido' => 'Mendoza', 'segundoApellido' => 'Gonzalez', 'dui' => '98976567-8', 'salario_base' => 10000, 'fechaNacimiento' => '1996-10-05', 'fechaContratacion' => '2023-01-01', 'pasaporte' => 'A56756542', 'carnetResidencia' => '1267654', 'estadoCivil' => 'Soltero', 'sexo' => 'M', 'telefono' => '25367896', 'celular' => '76543234', 'estado' => 'Activo', 'puesto' => 'Desarrollador','email' => 'mail111@mail.com'],

            ['primerNombre' => 'Sara', 'segundoNombre' => 'Elizabeht', 'primerApellido' => 'Monterrosa', 'segundoApellido' => 'Estrada', 'dui' => '87898632-1', 'salario_base' => 1000, 'fechaNacimiento' => '1996-12-08', 'fechaContratacion' => '2023-02-01', 'pasaporte' => 'BB7898654', 'carnetResidencia' => '9876567', 'estadoCivil' => 'Soltera', 'sexo' => 'F', 'telefono' => '29317796', 'celular' => '76231234', 'estado' => 'Activo', 'puesto' => 'Desarrollador','email' => 'mail2@mail.com'],

            ['primerNombre' => 'Jose', 'segundoNombre' => 'Martin', 'primerApellido' => 'Paredes', 'segundoApellido' => 'Fuentes', 'dui' => '21452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo', 'puesto' => 'Desarrollador','email' => 'mail3@mail.com'],

            ['primerNombre' => 'Olga', 'segundoNombre' => 'Cañon', 'primerApellido' => 'Pineda', 'segundoApellido' => 'Fuentes', 'dui' => '23452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail4@mail.com'],

            ['primerNombre' => 'Juan', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '22452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail5@mail.com'],

            ['primerNombre' => 'Fernando', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '24452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail6@mail.com'],

            ['primerNombre' => 'Julio', 'segundoNombre' => 'Cesar', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '25452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo', 'puesto' => 'Desarrollador','email' => 'mail7@mail.com'],

            ['primerNombre' => 'Juan', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '26452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail8@mail.com'],

            ['primerNombre' => 'Arturo', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Mendoza', 'dui' => '27452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail9@mail.com'],

            ['primerNombre' => 'Helen', 'segundoNombre' => 'Beatriz', 'primerApellido' => 'Fuentes', 'segundoApellido' => 'Delgado', 'dui' => '28452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail10@mail.com'],

            ['primerNombre' => 'Jorge', 'segundoNombre' => 'Antonio', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '29452345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail11@mail.com'],

            ['primerNombre' => 'Jhoanna', 'segundoNombre' => 'Abigail', 'primerApellido' => 'Paredes', 'segundoApellido' => 'Figueroa', 'dui' => '21052345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail12@mail.com'],

            ['primerNombre' => 'Carlos', 'segundoNombre' => 'Jose', 'primerApellido' => 'Perez', 'segundoApellido' => 'Fuentes', 'dui' => '21152345-8', 'salario_base' => 8000, 'fechaNacimiento' => '1993-01-15', 'fechaContratacion' => '2022-01-01', 'pasaporte' => 'C56711542', 'carnetResidencia' => '1888654', 'estadoCivil' => 'Casado', 'sexo' => 'M', 'telefono' => '27777896', 'celular' => '79943233', 'estado' => 'Activo','puesto' => 'Desarrollador', 'email' => 'mail13@mail.com'],
        ];

        foreach($empleados as $empleado){
            Empleados::create($empleado);
        }
    }
}
