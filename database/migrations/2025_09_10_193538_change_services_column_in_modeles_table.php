<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->text('services')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->json('services')->nullable()->change();
        });
    }
};

