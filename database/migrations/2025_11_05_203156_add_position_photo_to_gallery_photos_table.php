<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositionPhotoToGalleryPhotosTable extends Migration
{
    public function up()
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->integer('position_photo')->default(0)->after('photo_url')->index();
        });
    }

    public function down()
    {
        Schema::table('gallery_photos', function (Blueprint $table) {
            $table->dropColumn('position_photo');
        });
    }
}
