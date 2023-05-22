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
            $table->string('primerNombre',400)->nullable();
            $table->string('segundoNombre',400)->nullable();
            $table->string('primerApellido',400)->nullable();
            $table->string('segundoApellido',400)->nullable();
            $table->string('dui',30)->unique();
            $table->decimal('salario_base',8,2)->nullable();
            $table->date('fechaNacimiento')->nullable();
            $table->date('fechaContratacion')->nullable();
            $table->string('pasaporte',20)->nullable();
            $table->string('carnetResidencia',20)->nullable();
            $table->string('estadoCivil',200)->nullable();
            $table->string('sexo')->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('celular',20)->nullable();
            $table->string('estado')->nullable();
            $table->string('puesto')->nullable();
            $table->string('email')->unique()->nullable();
            // $table->foreignId('areaPuesto_id')->constrained('area_puestos')->onDelete('cascade')->nullable();
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
