<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddDureeToHistoriqueLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('historique_lives', function (Blueprint $table) {
            $table->integer('duree')->nullable()->after('date_fin')->comment('Durée en minutes');
        });

        // Attendre un peu pour que la colonne soit créée
        sleep(1);

        // Mettre à jour les durées pour les enregistrements existants
        $this->updateExistingDurations();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('historique_lives', function (Blueprint $table) {
            $table->dropColumn('duree');
        });
    }

    /**
     * Met à jour les durées pour les enregistrements existants
     */
    private function updateExistingDurations()
    {
        // Vérifier que la table existe
        if (!Schema::hasTable('historique_lives')) {
            return;
        }

        // Pour les enregistrements existants qui ont une date de fin
        $historiques = DB::table('historique_lives')
            ->whereNotNull('date_fin')
            ->whereNotNull('date_commencement')
            ->get();
        
        foreach ($historiques as $historique) {
            try {
                $debut = Carbon::parse($historique->date_commencement);
                $fin = Carbon::parse($historique->date_fin);
                $duree = $debut->diffInMinutes($fin);
                
                DB::table('historique_lives')
                    ->where('id', $historique->id)
                    ->update(['duree' => $duree]);
            } catch (\Exception $e) {
                // Ignorer les erreurs de parsing de date
                continue;
            }
        }

        // Pour les enregistrements "commencer" sans date de fin, mettre duree = 0 ou NULL
        DB::table('historique_lives')
            ->whereNull('date_fin')
            ->update(['duree' => 0]);
    }
}