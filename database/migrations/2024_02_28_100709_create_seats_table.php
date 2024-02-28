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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean('isbooking')->default(false);
            $table->timestamps();
            $table->foreignId('zone_id')->reference('id')->on('zones')->nullable();
        });
        schema::table('reservations', function (Blueprint $table) {
            $table->foreignId('seat_id')->references('id')->on('seats')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
