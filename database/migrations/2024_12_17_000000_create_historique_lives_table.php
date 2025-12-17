<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historique_lives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade');
            $table->enum('statut', ['commencer', 'fin'])->default('commencer');
            $table->boolean('is_prive')->default(false);
            $table->timestamp('date_commencement')->nullable();
            $table->timestamp('date_fin')->nullable();
            $table->timestamps();
            
            $table->index(['modele_id', 'statut']);
            $table->index(['is_prive', 'date_commencement']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('historique_lives');
    }
};