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
        // database/migrations/xxxx_create_shows_prives_table.php
Schema::create('show_prives', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');   // client
    $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade'); // modèle
    $table->date('date');
    $table->time('debut');
    $table->time('fin');
    $table->integer('duree'); // minutes
    $table->integer('jetons_total');
    $table->string('etat')->default('en_attente'); // en_attente, confirmé, terminé
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shows_prives');
    }
};
