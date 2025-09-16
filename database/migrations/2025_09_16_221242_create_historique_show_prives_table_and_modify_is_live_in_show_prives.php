<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1️⃣ Créer la table historique
        Schema::create('historique_show_prives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('show_prive_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('modele_id')->unsigned();
            $table->date('date');
            $table->time('debut');
            $table->time('fin');
            $table->integer('duree');
            $table->integer('jetons_total');
            $table->string('etat')->default('en_attente');
            $table->boolean('is_active')->default(0);
            $table->boolean('is_live')->default(1); // <-- valeur par défaut modifiée
            $table->string('room_key')->nullable();
            $table->string('access_token')->nullable();
            $table->string('socket_room')->nullable();
            $table->string('broadcaster_socket_id')->nullable();
            $table->timestamps();
        });

        // 2️⃣ Modifier la colonne is_live dans show_prives
        Schema::table('show_prives', function (Blueprint $table) {
            $table->boolean('is_live')->default(1)->change(); // nouvelle valeur par défaut
        });
    }

    public function down()
    {
        // Supprimer la table historique
        Schema::dropIfExists('historique_show_prives');

        // Revenir à l'ancien default de show_prives
        Schema::table('show_prives', function (Blueprint $table) {
            $table->boolean('is_live')->default(0)->change(); // ancien default
        });
    }
};
