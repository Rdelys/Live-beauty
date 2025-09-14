<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTokenHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('user_token_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->integer('previous_jetons')->default(0);
            $table->integer('new_jetons')->default(0);
            $table->unsignedInteger('delta')->default(0); // on n'enregistrera que delta > 0
            $table->string('source')->nullable(); // ex: 'admin', 'purchase', 'refund'...
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_token_histories');
    }
}
