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
    Schema::create('email_registros', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_empleado')->constrained('update_empleados');
        $table->string('emailResptor');
        $table->foreignId('fk_userEmisor')->constrained('users');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_registros');
    }
};
