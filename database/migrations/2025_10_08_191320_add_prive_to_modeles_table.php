<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->integer('prive')->default(0)->after('en_ligne');
        });
    }

    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn('prive');
        });
    }
};
