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
        Schema::create('modele_connexions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade');
            $table->timestamp('date_connexion')->nullable();
            $table->timestamp('date_deconnexion')->nullable();
            $table->integer('duree_session_secondes')->nullable()->comment('Durée en secondes');
            $table->timestamps();
            
            // Index pour les performances
            $table->index('modele_id');
            $table->index('date_connexion');
            $table->index('date_deconnexion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modele_connexions');
    }
};