<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->string('jetons_surprise')->nullable()->after('en_ligne'); 
            // nullable = optionnel, after('en_ligne') = juste après la colonne en_ligne
        });
    }

    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn('jetons_surprise');
        });
    }
};
