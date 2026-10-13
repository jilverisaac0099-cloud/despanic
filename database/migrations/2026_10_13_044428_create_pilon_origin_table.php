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
        Schema::create('pilons_origin', function (Blueprint $table) {
            $table->id();
            $table->decimal('pounds_contributed', 10, 2);

            $table->unsignedBigInteger("lot_reception_id");
            $table->foreign("lot_reception_id")->references("id")->on("lots_receptions")->onDelete("cascade")->onUpdate("cascade");


            $table->unsignedBigInteger("pilon_id");
            $table->foreign("pilon_id")->references("id")->on("pilons")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilons_origin');
    }
};
