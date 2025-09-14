<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeleHistoriquesTable extends Migration
{
    public function up()
    {
        Schema::create('modele_historiques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modele_id')->index();
            $table->date('jour'); // juste la date
            $table->timestamps();

            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('modele_historiques');
    }
}
