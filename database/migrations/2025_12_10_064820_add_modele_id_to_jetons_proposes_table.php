<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('jetons_proposes', function (Blueprint $table) {
            $table->unsignedBigInteger('modele_id')->nullable()->after('prise');
            $table->foreign('modele_id')->references('id')->on('modeles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('jetons_proposes', function (Blueprint $table) {
            $table->dropForeign(['modele_id']);
            $table->dropColumn('modele_id');
        });
    }
};
