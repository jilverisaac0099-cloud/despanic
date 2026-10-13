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
        Schema::create('lots_reception', function (Blueprint $table) {
            $table->id();
            $table->string('producer', 100);
            $table->string('origin', 100);
            $table->date('date');
            $table->decimal('pounds_received', 10, 2);
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots_reception');
    }
};
