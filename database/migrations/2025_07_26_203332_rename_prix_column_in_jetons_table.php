<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePrixColumnInJetonsTable extends Migration
{
    public function up()
    {
        Schema::table('jetons', function (Blueprint $table) {
            $table->renameColumn('prix', 'nombre_de_jetons');
        });
    }

    public function down()
    {
        Schema::table('jetons', function (Blueprint $table) {
            $table->renameColumn('nombre_de_jetons', 'prix');
        });
    }
}

