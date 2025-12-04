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
        Schema::create('visites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_visiteur');
            $table->string('entreprise')->nullable();        
            $table->foreignId('client_id')->constrained()->cascadeOnDelete();
            $table->string('personne_rencontree')->nullable();
            $table->string('motif')->nullable();
            $table->dateTime('heure_arrivee')->nullable();
            $table->dateTime('heure_depart')->nullable();
            $table->string('statut')->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visites');
    }
};
