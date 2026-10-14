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
        Schema::create('drawers_entrys', function (Blueprint $table) {
            $table->id();
            $table->string('number', 50);
            $table->decimal('weight_humedity', 10, 2);
            $table->date('date_registration');
            $table->string('control_oven', 50)->nullable();
            $table->date('date_cycle')->nullable();
            $table->time('start_time')->nullable();
            $table->decimal('scheduled_hours', 5, 2)->nullable();
            $table->decimal('average_temperature', 8, 2)->nullable();
            $table->text('observations')->nullable();

        $table->unsignedBigInteger("tobacco_classes_id");
        $table->foreign("tobacco_classes_id")->references("id")->on("tobacco_classes")->onDelete("cascade")->onUpdate("cascade");

        $table->unsignedBigInteger("drying_reception_id");
        $table->foreign("drying_reception_id")->references("id")->on("drying_receptions")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawers_entrys');
    }
};
