<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            if (! Schema::hasColumn('gallery_photos', 'video_url')) {
                $table->string('video_url')->nullable()->after('photo_url');
            }
        });
    }

    public function down(): void
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            if (Schema::hasColumn('gallery_photos', 'video_url')) {
                $table->dropColumn('video_url');
            }
        });
    }
};
