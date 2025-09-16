<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1️⃣ Modifier la valeur par défaut de is_live
        Schema::table('show_prives', function (Blueprint $table) {
    $table->boolean('is_live')->default(1)->change();
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

    $table->foreign('show_prive_id')->references('id')->on('show_prives')->onDelete('cascade');
});

    }

    public function down(): void
    {
        Schema::table('show_prives', function (Blueprint $table) {
            $table->tinyInteger('is_live')->default(0)->change();
        });

        Schema::dropIfExists('historique_show_prives');
    }
};
