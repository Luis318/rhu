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
        Schema::create('boletas_de_pagos', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_descuentos', 8,2);
            $table->decimal('horas_trabajadas_mensuales', 8,2);
            $table->decimal('total_salario', 8,2);
            $table->date('fecha_boleta');
            $table->foreignId('id_empleado')->constrained('empleados')->onDelete('cascade');
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
        Schema::dropIfExists('boletas_de_pagos');
    }
};
