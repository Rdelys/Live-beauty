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
        $table->float('prix_flou_detail')->nullable()->after('prix_flou');
    });
}

public function down()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->dropColumn('prix_flou_detail');
    });
}

};
