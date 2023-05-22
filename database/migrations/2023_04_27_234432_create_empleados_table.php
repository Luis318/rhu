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
            $table->string('primerNombre',400,null);
            $table->string('segundoNombre',400,null);
            $table->string('primerApellido',400,null);
            $table->string('segundoApellido',400,null);
            $table->string('dui',30)->unique();
            $table->decimal('salario_base',8,2,null);
            $table->date('fechaNacimiento',null);
            $table->date('fechaContratacion',null);
            $table->string('pasaporte',20,null);
            $table->string('carnetResidencia',20,null);
            $table->integer('estadoCivil',200,null);
            $table->integer('sexo',null);
            $table->string('telefono',20,null);
            $table->string('celular',20,null);
            $table->string('estado',null);
            $table->string('puesto',null);
            $table->string('email',null)->unique();
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
