<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJetonsAndJetonsProposesTables extends Migration
{
    /**
     * Exécution de la migration
     */
    public function up(): void
    {
        if (!Schema::hasColumn('jetons_proposes', 'prise')) {
            Schema::table('jetons_proposes', function (Blueprint $table) {
                $table->boolean('prise')->default(0)->after('nombre_de_jetons');
            });
        }

        if (!Schema::hasColumn('jetons', 'jeton_propose_id')) {
            Schema::table('jetons', function (Blueprint $table) {
                $table->unsignedBigInteger('jeton_propose_id')->nullable()->after('id');
                $table->boolean('jeton_propose_prise')->default(0)->after('jeton_propose_id');
                $table->foreign('jeton_propose_id')
                      ->references('id')
                      ->on('jetons_proposes')
                      ->onDelete('set null');
            });
        }
    }

    /**
     * Rollback de la migration
     */
    public function down(): void
    {
        Schema::table('jetons', function (Blueprint $table) {
            if (Schema::hasColumn('jetons', 'jeton_propose_id')) {
                $table->dropForeign(['jeton_propose_id']);
                $table->dropColumn(['jeton_propose_id', 'jeton_propose_prise']);
            }
        });

        Schema::table('jetons_proposes', function (Blueprint $table) {
            if (Schema::hasColumn('jetons_proposes', 'prise')) {
                $table->dropColumn('prise');
            }
        });
    }
}
