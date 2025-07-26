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
    Schema::table('jetons', function (Blueprint $table) {
        $table->unsignedBigInteger('modele_id')->nullable()->after('id'); // Ajout SANS contrainte
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jetons', function (Blueprint $table) {
            //
        });
    }
};
