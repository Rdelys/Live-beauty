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
    Schema::table('albums', function (Blueprint $table) {
        $table->enum('etat', ['gratuit', 'payant'])->default('gratuit')->after('nom');
        $table->string('type_flou')->nullable()->after('etat'); // soft | strong | pixel | null
    });
}

public function down()
{
    Schema::table('albums', function (Blueprint $table) {
        $table->dropColumn(['etat', 'type_flou']);
    });
}

};
