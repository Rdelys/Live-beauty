<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            // ⚠️ MySQL ne permet pas de modifier une colonne directement via ->nullable() ici,
            // on utilise la méthode change() pour altérer une colonne existante.
            $table->string('photo_url')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            // On remet la contrainte NOT NULL (comme avant)
            $table->string('photo_url')->nullable(false)->change();
        });
    }
};
