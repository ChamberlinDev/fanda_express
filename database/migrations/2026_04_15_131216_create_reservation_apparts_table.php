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
        Schema::create('reservation_apparts', function (Blueprint $table) {
            $table->id();
            $table->string('code_reservation')->unique();
            $table->unsignedBigInteger('appartement_id');
            $table->foreign('appartement_id')->references('id')->on('appartements')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('statut')->default('en attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_apparts');
    }
};
