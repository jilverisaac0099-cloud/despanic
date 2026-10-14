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
        Schema::create('exit_dryings', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight_dry_exit', 10, 2);
            $table->decimal('humedity_weight_entry', 10, 2);
            $table->integer('quantity_bale');
            $table->decimal('remnat_weight', 10, 2);
            $table->date('pickup_date');

            $table->unsignedBigInteger("drying_reception_id");
        $table->foreign("drying_reception_id")->references("id")->on("drying_receptions")->onDelete("cascade")->onUpdate("cascade");

        $table->unsignedBigInteger("tobacco_classes_id");
        $table->foreign("tobacco_classes_id")->references("id")->on("tobacco_classes")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exit_dryings');
    }
};
