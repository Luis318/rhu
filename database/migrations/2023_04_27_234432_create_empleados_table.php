<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('primerNombre',400);
            $table->string('segundoNombre',400);
            $table->string('primerApellido',400);
            $table->string('segundoApellido',400);
            $table->string('dui',30);
            $table->decimal('salario_base',8,2);
            $table->date('fechaNacimiento');
            $table->date('fechaContratacion');
            $table->string('pasaporte',20);
            $table->string('carnetResidencia',20);
            $table->string('estadoCivil',200);
            $table->string('sexo',50);
            $table->string('telefono',20);
            $table->string('celular',20);
            $table->string('estado');
            $table->string('email')->unique();
            $table->foreignId('areaPuesto_id')->constrained('area_puestos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
};
