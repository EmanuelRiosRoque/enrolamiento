<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('update_empleados', function (Blueprint $table) {
            $table->integer('nuM_EMPL');
            $table->string('nombres');
            $table->string('apellidop');
            $table->string('apellidom');
            $table->string('estatus');
            $table->string('rfc');
            $table->string('curp');
            $table->string('areA_ADSCRIPCION');
            $table->string('descripcioN_AREA_ADSCRIPCION');
            $table->integer('puesto');
            $table->string('descripcioN_PUESTO');
            $table->integer('ubicacioN_AREA_TRABAJO');
            $table->string('descripcioN_AREA_TRABAJO');
            $table->integer('nivel');
            $table->integer('plaza');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('update_empleados');
    }
};
