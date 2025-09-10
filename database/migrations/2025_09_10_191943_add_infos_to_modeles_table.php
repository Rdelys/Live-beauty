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
        $table->integer('age')->nullable();
        $table->string('taille')->nullable();
        $table->string('silhouette')->nullable();
        $table->string('poitrine')->nullable();
        $table->string('fesse')->nullable();
        $table->string('langue')->nullable(); // ex: "fr, en"
        $table->json('services')->nullable(); // ce qu’elle propose
    });
}

public function down()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->dropColumn([
            'age', 'taille', 'silhouette', 'poitrine', 'fesse', 'langue', 'services'
        ]);
    });
}

};
