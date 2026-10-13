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
        Schema::create('destemming_clousure', function (Blueprint $table) {
            $table->id();
            $table->decimal('peso_gold', 10, 2);
            $table->decimal('total_sting', 10, 2);
            $table->decimal('total_vein', 10, 2);
            $table->date('date_clousure');


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
        Schema::dropIfExists('destemming_clousure');
    }
};
