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
        Schema::create('lots_details', function (Blueprint $table) {
            $table->id();
            $table->string('cut_number', 50);
            $table->decimal('pounds', 10, 2);
            $table->string('quality', 50);

            $table->unsignedBigInteger("lots_reception_id");
            $table->foreign("lots_reception_id")->references("id")->on("lots_reception")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots_details');
    }
};
