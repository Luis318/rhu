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
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empleado')->constrained('empleados')->onDelete('cascade');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('descripcion');
            $table->string('tipo');
            $table->integer('diasTrabajados');
            $table->decimal('monto',8,2);
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
        Schema::dropIfExists('vacaciones');
    }
};
