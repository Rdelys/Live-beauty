<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1️⃣ Mettre à jour show_prives
        Schema::table('show_prives', function (Blueprint $table) {
            // Ajouter is_active et is_live si elles n'existent pas
            if (!Schema::hasColumn('show_prives', 'is_active')) {
                $table->boolean('is_active')->default(0);
            }
            if (!Schema::hasColumn('show_prives', 'is_live')) {
                $table->boolean('is_live')->default(1);
            } else {
                $table->boolean('is_live')->default(1)->change();
            }
        });

        // 2️⃣ Créer la table historique_show_prives
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
            $table->boolean('is_live')->default(1);
            $table->string('room_key')->nullable();
            $table->string('access_token')->nullable();
            $table->string('socket_room')->nullable();
            $table->string('broadcaster_socket_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Supprimer la table historique si rollback
        Schema::dropIfExists('historique_show_prives');

        // Optionnel : remettre is_live à 0 par défaut si rollback
        Schema::table('show_prives', function (Blueprint $table) {
            if (Schema::hasColumn('show_prives', 'is_live')) {
                $table->boolean('is_live')->default(0)->change();
            }
        });
    }
};
