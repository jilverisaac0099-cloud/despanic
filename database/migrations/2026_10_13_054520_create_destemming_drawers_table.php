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
        Schema::create('destemming_drawers', function (Blueprint $table) {
            $table->id();
            $table->string('number', 50);
            $table->decimal('pounds_tripe', 10, 2);
            $table->date('collection_date');

            $table->unsignedBigInteger("pilon_id");
            $table->foreign("pilon_id")->references("id")->on("pilons")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('destemming_drawers');
    }
};
