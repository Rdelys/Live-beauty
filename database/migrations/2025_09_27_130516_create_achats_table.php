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
        Schema::create('achats', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('modele_id');
    $table->integer('jetons'); // coût en jetons
    $table->timestamps();

    $table->unique(['user_id', 'modele_id']); // ✅ un seul achat par modèle
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achats');
    }
};
