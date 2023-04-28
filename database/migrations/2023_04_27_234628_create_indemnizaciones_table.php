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
        Schema::create('indemnizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('categoria');
            $table->decimal('monto',8,2);
            $table->string('descripcionque', 900);
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
        Schema::dropIfExists('indemnizaciones');
    }
};
