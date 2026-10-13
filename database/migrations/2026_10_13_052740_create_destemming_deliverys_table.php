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
        Schema::create('destemming_deliverys', function (Blueprint $table) {
            $table->id();
            $table->date('delivery_date');
            $table->integer('bags_delivered');

            $table->unsignedBigInteger("destemming_preparation_id");
            $table->foreign("destemming_preparation_id")->references("id")->on("destemming_preparations")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('destemming_deliverys');
    }
};
