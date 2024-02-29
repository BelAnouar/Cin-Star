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
        Schema::create('acteur_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('acteur_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('acteur_id')->references('id')->on('acteurs')->onDelete('cascade');
            $table->foreign('movie_id')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acteur_movie');
    }
};
