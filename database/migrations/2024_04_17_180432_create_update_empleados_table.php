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
            $table->id();
            $table->string('nuM_EMPL')->nullable();
            $table->string('nombres')->nullable();
            $table->string('apellidop')->nullable();
            $table->string('apellidom')->nullable();
            $table->string('estatus')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('areA_ADSCRIPCION')->nullable();
            $table->string('descripcioN_AREA_ADSCRIPCION')->nullable();
            $table->string('puesto')->nullable();
            $table->string('descripcioN_PUESTO')->nullable();
            $table->string('ubicacioN_AREA_TRABAJO')->nullable();
            $table->string('descripcioN_AREA_TRABAJO')->nullable();
            $table->string('nivel')->nullable();
            $table->string('plaza')->nullable();
            $table->foreignId('fk_usrCreated')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
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
