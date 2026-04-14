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
        Schema::create('rapports', function (Blueprint $table) {
            $table->id();
            $table->enum('type_rapport', ['journalier', 'hebdomadaire', 'mensuel', 'annuel']);
            $table->date('date_debut');
            $table->date('date_fin');
            $table->decimal('montant_encaisse', 10, 2)->default(0);
            $table->decimal('montant_perdu', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapports');
    }
};
