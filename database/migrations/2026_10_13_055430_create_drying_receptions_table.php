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
        Schema::create('drying_receptions', function (Blueprint $table) {
            $table->id();
            $table->date('date_income');
            $table->decimal('weigth_gold', 10, 2);
            $table->decimal('weight_damp', 10, 2);
            $table->string('status', 50)->default('Pendiente');


            $table->unsignedBigInteger("destemming_clousure_id");
            $table->foreign("destemming_clousure_id")->references("id")->on("destemming_clousures")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drying_receptions');
    }
};
