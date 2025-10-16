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
    Schema::create('gallery_photos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('modele_id')->constrained('modeles')->onDelete('cascade');
        $table->string('photo_url');
        $table->boolean('payant')->default(false);
        $table->decimal('prix', 8, 2)->nullable();
        $table->string('type_flou')->nullable(); // soft, strong, pixel
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_photos');
    }
};
