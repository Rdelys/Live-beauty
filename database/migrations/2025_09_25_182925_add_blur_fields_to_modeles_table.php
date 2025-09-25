<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBlurFieldsToModelesTable extends Migration
{
    public function up()
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->tinyInteger('mode')->default(0)->after('en_ligne'); // 0 = gratuit, 1 = payant
            $table->string('type_flou')->nullable()->after('mode');     // e.g. soft, strong, pixel
            $table->decimal('prix_flou', 8, 2)->nullable()->after('type_flou');
        });
    }

    public function down()
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn(['mode', 'type_flou', 'prix_flou']);
        });
    }
}
