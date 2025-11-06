<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->foreignId('album_id')->nullable()->constrained('albums')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->dropConstrainedForeignId('album_id');
        });
    }
};
