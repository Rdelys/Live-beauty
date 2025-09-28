<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateAchatsUniqueIndex extends Migration
{
    public function up()
    {
        // 0) safety: normaliser les NULL (on garde historique avant suppression)
        DB::table('achats')->whereNull('photo_path')->update(['photo_path' => '']);
        DB::table('achats')->whereNull('type')->update(['type' => 'detail']);

        // 1) supprimer les doublons EXACTS en gardant la row avec l'id le plus petit
        //    => ATTENTION : conserve la plus ancienne occurrence (min id)
        DB::statement("
            DELETE a1 FROM achats a1
            INNER JOIN achats a2
              ON a1.user_id = a2.user_id
             AND a1.modele_id = a2.modele_id
             AND COALESCE(a1.type,'') = COALESCE(a2.type,'')
             AND COALESCE(a1.photo_path,'') = COALESCE(a2.photo_path,'')
             AND a1.id > a2.id
        ");

        // 2) s'assurer que les colonnes photo_path et type ont une valeur par défaut et NOT NULL
        //    nécessite doctrine/dbal pour ->change()
        Schema::table('achats', function (Blueprint $table) {
            $table->string('photo_path')->default('')->change();
            $table->string('type')->default('detail')->change();
        });

        // 3) créer le NOUVEL index UNIQUE (user_id, modele_id, type, photo_path) si absent
        $newIndex = DB::select("SHOW INDEX FROM `achats` WHERE Key_name = 'achats_user_modele_type_photo_unique'");
        if (empty($newIndex)) {
            Schema::table('achats', function (Blueprint $table) {
                $table->unique(['user_id', 'modele_id', 'type', 'photo_path'], 'achats_user_modele_type_photo_unique');
            });
        }

        // 4) si l'ancien index UNIQUE user_id+modele_id existe, on peut maintenant le dropper
        $oldIndex = DB::select("SHOW INDEX FROM `achats` WHERE Key_name = 'achats_user_id_modele_id_unique'");
        if (!empty($oldIndex)) {
            // On utilise statement parce que parfois dropUnique peut échouer sur nom différent
            DB::statement("ALTER TABLE `achats` DROP INDEX `achats_user_id_modele_id_unique`");
        }
    }

    public function down()
    {
        // rollback : recréer l'ancien unique et supprimer le nouveau
        $newIndex = DB::select("SHOW INDEX FROM `achats` WHERE Key_name = 'achats_user_modele_type_photo_unique'");
        if (!empty($newIndex)) {
            Schema::table('achats', function (Blueprint $table) {
                $table->dropUnique('achats_user_modele_type_photo_unique');
            });
        }

        // rendre photo_path nullable à l'état antérieur (optionnel)
        Schema::table('achats', function (Blueprint $table) {
            $table->string('photo_path')->nullable()->change();
            $table->string('type')->nullable()->change();
        });

        // recréer l'ancien unique si nécessaire
        $oldIndex = DB::select("SHOW INDEX FROM `achats` WHERE Key_name = 'achats_user_id_modele_id_unique'");
        if (empty($oldIndex)) {
            Schema::table('achats', function (Blueprint $table) {
                $table->unique(['user_id', 'modele_id'], 'achats_user_id_modele_id_unique');
            });
        }
    }
}
