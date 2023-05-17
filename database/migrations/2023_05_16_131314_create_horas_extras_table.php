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
        Schema::create('horas_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->constrained('empleados')->onDelete('cascade');
            $table->decimal('cantidadDiurnas',8,2)->default(0);
            $table->decimal('montoDiurnas',8,2)->default(0);
            $table->decimal('cantidadNocturnas',8,2)->default(0);
            $table->decimal('montoNocturnas',8,2)->default(0);
            $table->decimal('cantidadNocturnasFeriado',8,2)->default(0);
            $table->decimal('montoNocturnasFeriado',8,2)->default(0);
            $table->decimal('cantidadDiurnasFeriado',8,2)->default(0);
            $table->decimal('montoDiurnasFeriado',8,2)->default(0);
            $table->date('fecha');
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
        Schema::dropIfExists('horas_extras');
    }
};
