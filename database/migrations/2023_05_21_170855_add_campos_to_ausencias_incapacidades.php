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
        Schema::table('ausencia_incapacidades', function (Blueprint $table) {
            $table->date('fecha')->nullable();
            $table->string('tipo_incapacidad')->nullable();
            $table->string('comprobante')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ausencia_incapacidades', function (Blueprint $table) {
            $table->dropColumn('fecha');
            $table->dropColumn('tipo_incapacidad');
            $table->dropColumn('comprobante');
        });
    }
};
