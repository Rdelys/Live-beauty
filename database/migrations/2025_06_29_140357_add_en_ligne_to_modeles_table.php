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
        $table->boolean('en_ligne')->default(false);
    });
}

public function down(): void
{
    Schema::table('modeles', function (Blueprint $table) {
        $table->dropColumn('en_ligne');
    });
}

};
