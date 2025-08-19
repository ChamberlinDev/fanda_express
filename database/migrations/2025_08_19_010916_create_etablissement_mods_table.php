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
        Schema::create('etablissement_mods', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // hotel ou appartement
            $table->string('nom');
            $table->string('ville')->nullable();
            $table->text('adresse');
            $table->integer('classement')->nullable(); // pour hotel
            $table->integer('nbre_chambre')->nullable(); // pour appartement
            $table->integer('surface')->nullable(); // pour appartement
            $table->text('description')->nullable();
            $table->text('equipements')->nullable();
            $table->string('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement_mods');
    }
};
