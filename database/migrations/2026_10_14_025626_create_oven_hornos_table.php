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
        Schema::create('oven_hornos', function (Blueprint $table) {
            $table->id();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->decimal('scheduled_hours', 5, 2)->nullable();
            $table->decimal('average_temperature', 8, 2)->nullable();
            $table->text('observations')->nullable();

        $table->unsignedBigInteger("drying_reception_id");
        $table->foreign("drying_reception_id")->references("id")->on("drying_receptions")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oven_hornos');
    }
};
