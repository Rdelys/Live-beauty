<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');     // Client
            $table->unsignedBigInteger('modele_id');   // Modèle choisi

            $table->text('detail');                    // Description du film
            $table->integer('minutes');                // Durée demandée
            $table->integer('jetons');                 // Jetons payés
            $table->enum('type_envoi', ['email','whatsapp']);
            $table->enum('statut', ['en_cours', 'envoye', 'termine'])
                ->default('en_cours');

            $table->timestamps();

            // FK
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('modele_id')->references('id')->on('modeles')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
