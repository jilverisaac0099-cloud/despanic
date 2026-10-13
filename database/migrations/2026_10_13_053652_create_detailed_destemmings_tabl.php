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
        Schema::create('detailed_destemmings', function (Blueprint $table) {
            $table->id();
            $table->string('detailed_week', 50)->nullable();
            $table->integer('days');
            $table->decimal('pounds_tripe', 10, 2);
            $table->decimal('pounds_sting', 10, 2);
            $table->date('registration_date');

            $table->unsignedBigInteger("destemming_delivery_id");
            $table->foreign("destemming_delivery_id")->references("id")->on("destemming_deliverys")->onDelete("cascade")->onUpdate("cascade");

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
        Schema::dropIfExists('detailed_destemmings');
    }
};
