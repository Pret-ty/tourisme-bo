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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('place_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('guide_id')->nullable();
            $table->date('date');
            $table->time('heure');
            $table->integer('personnes');
            $table->text('transport')->nullable();
            $table->text('statut')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
