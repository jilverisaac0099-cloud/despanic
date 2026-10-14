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
        Schema::create('bale_compositions', function (Blueprint $table) {
            $table->id();
            $table->decimal('pounds_contributed', 10, 2);
            $table->decimal('remant', 10, 2);

        $table->unsignedBigInteger("drying_reception_id");
        $table->foreign("drying_reception_id")->references("id")->on("drying_receptions")->onDelete("cascade")->onUpdate("cascade");

        $table->unsignedBigInteger("bale_drying_id");
        $table->foreign("bale_drying_id")->references("id")->on("bale_dryings")->onDelete("cascade")->onUpdate("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bale_compositions');
    }
};
