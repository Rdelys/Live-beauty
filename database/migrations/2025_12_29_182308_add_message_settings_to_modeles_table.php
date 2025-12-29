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
            $table->string('message_font_size')->nullable()->default('14px')->after('prive');
            $table->string('message_color')->nullable()->default('#ffffff')->after('message_font_size');
            $table->string('received_message_font_size')->nullable()->default('14px')->after('message_color');
            $table->string('received_message_color')->nullable()->default('#ffffff')->after('received_message_font_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modeles', function (Blueprint $table) {
            $table->dropColumn([
                'message_font_size',
                'message_color',
                'received_message_font_size',
                'received_message_color'
            ]);
        });
    }
};