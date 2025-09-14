<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelConnectionsTable extends Migration
{
    public function up()
    {
        Schema::create('model_connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('modele_id')->index();
            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();
            $table->timestamps();

            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('model_connections');
    }
}