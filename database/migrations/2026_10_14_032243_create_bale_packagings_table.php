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
        Schema::create('bale_packagings', function (Blueprint $table) {
            $table->id();
            $table->string('bale_number', 50);
            $table->date('packing_date');
            $table->string('class_name', 100);
            $table->string('provenance', 100);
            $table->string('pylon_origin', 100)->nullable();
            $table->decimal('net_weight', 10, 2);
            $table->string('status_bale', 50);
            $table->date('registration_date');

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
        Schema::dropIfExists('bale_packagings');
    }
};
