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
        Schema::create('drying_closures', function (Blueprint $table) {
            $table->id();
        $table->date('extended_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->decimal('weight_gold', 10, 2);
            $table->decimal('weight_damp', 10, 2);
            $table->decimal('weight_dry', 10, 2);
            $table->decimal('loss_humedity', 10, 2);
            $table->decimal('percentage_loss', 5, 2);
            $table->integer('bales_total');
            $table->decimal('weight_remnant', 10, 2);
            $table->decimal('hours_total', 8, 2);
            $table->string('final_status', 50);
            $table->date('date_cloused');

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
        Schema::dropIfExists('drying_closures');
    }
};
