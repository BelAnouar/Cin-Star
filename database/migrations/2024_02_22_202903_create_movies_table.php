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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string('title');
            $table->string('year');
            $table->string('duration');
            $table->string("release_date");
            $table->string("Awards");
            $table->string('genre');
            $table->string('acteur');
            $table->string('Poster');
            $table->string('type');
            $table->longText('description');
            $table->timestamps();
            $table->foreignId('salleId')->reference('id')->on('salle_de_cinemas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};