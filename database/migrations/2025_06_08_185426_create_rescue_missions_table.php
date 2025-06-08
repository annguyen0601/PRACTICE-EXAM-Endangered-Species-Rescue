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
        Schema::create('rescue_missions', function (Blueprint $table) {
            //rescue_missions: location_id (FK), leader_email (max 50), report (max 2048), success (boolean)
            $table->foreignId('location_id')->constrained()->onDelete('cascade');
            $table->string('leader_email', 50);
            $table->string('report', 2048);
            $table->boolean('success')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_missions');
    }
};
