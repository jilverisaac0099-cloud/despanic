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
        Schema::create('vein_destemmings', function (Blueprint $table) {
            $table->id();
            $table->integer('amount_bags');
            $table->decimal('total_pounds', 10, 2);
            $table->date('date_weighing');
            $table->string('vein_destemming', 100)->nullable();

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
        Schema::dropIfExists('vein_destemmings');
    }
};
