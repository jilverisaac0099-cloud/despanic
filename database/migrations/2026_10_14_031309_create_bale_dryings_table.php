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
        Schema::create('bale_dryings', function (Blueprint $table) {
            $table->id();
            $table->string('bale_code', 50)->unique();
            $table->decimal('net_weight', 10, 2);
            $table->date('packaging_date');

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
        Schema::dropIfExists('bale_dryings');
    }
};
