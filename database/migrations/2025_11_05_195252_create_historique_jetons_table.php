<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historique_jetons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('modele_id')->nullable()->constrained('modeles')->onDelete('set null');
            $table->unsignedInteger('nombre_jetons');
            $table->enum('type', ['jeton_action', 'surprise'])->default('jeton_action');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historique_jetons');
    }
};
