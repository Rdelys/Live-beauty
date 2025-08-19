<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->integer('duree_show_privee')->nullable()->after('nombre_jetons_show_privee'); // en minutes
    });
}

public function down()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->dropColumn('duree_show_privee');
    });
}

};
