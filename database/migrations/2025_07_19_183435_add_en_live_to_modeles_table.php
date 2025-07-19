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
        $table->boolean('en_live')->default(false);
    });
}

public function down()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->dropColumn('en_live');
    });
}

};
