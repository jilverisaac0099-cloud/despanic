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
        Schema::create('actividads', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_nombre'); // Quien hizo la acción
            $table->string('area');           // 1. Recepción, 2. Pilones, etc.
            $table->string('descripcion');    // Detalle de lo que hizo
            $table->timestamps();             // Registra el created_at (fecha y hora) automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actividads');
    }
};
