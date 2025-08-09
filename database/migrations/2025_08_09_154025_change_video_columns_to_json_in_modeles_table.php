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
    // On transforme les anciennes valeurs en JSON
    DB::table('modeles')->get()->each(function ($modele) {
        // video_link
        if (!empty($modele->video_link) && $modele->video_link[0] !== '[') {
            DB::table('modeles')
                ->where('id', $modele->id)
                ->update([
                    'video_link' => json_encode([$modele->video_link])
                ]);
        }

        // video_file
        if (!empty($modele->video_file) && $modele->video_file[0] !== '[') {
            DB::table('modeles')
                ->where('id', $modele->id)
                ->update([
                    'video_file' => json_encode([$modele->video_file])
                ]);
        }
    });

    // Maintenant on change le type
    Schema::table('modeles', function (Blueprint $table) {
        $table->json('video_link')->nullable()->change();
        $table->json('video_file')->nullable()->change();
    });
}

public function down()
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->string('video_link')->nullable()->change();
        $table->string('video_file')->nullable()->change();
    });
}

};
