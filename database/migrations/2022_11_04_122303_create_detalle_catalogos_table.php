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
        Schema::create('detalle_catalogos', function (Blueprint $table) {
            $table->id();
            $table->float('monto_cuenta', 8, 2);
            $table->foreignId('cuentas_id')->constrained('cuentas');
            $table->foreignId('periodos_id')->constrained('periodos');
            $table->foreignId('empresas_id')->constrained('empresas');
            $table->foreignId('informecontable_id')->constrained('informe_contables');
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
        Schema::dropIfExists('detalle_catalogos');
    }
};
