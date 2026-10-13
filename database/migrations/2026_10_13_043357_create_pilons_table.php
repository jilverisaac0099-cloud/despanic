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
        Schema::create('pilons', function (Blueprint $table) {
            $table->id();
            $table->string('number', 50)->unique();
            $table->decimal('weight', 10, 2);
            $table->date('assembly_date');
            $table->string('status', 50)->default('En Proceso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilons');
    }
};
