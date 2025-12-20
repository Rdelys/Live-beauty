<?php
// database/migrations/xxxx_add_lang_fields_to_chat_messages.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLangFieldsToChatMessages extends Migration
{
    public function up()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->string('original_language', 10)->nullable()->after('message');
            $table->text('translated_message')->nullable()->after('original_language');
            $table->string('translation_target', 10)->nullable()->after('translated_message');
            $table->boolean('translation_success')->default(false)->after('translation_target');
        });
    }

    public function down()
    {
        Schema::table('chat_messages', function (Blueprint $table) {
            $table->dropColumn(['original_language', 'translated_message', 'translation_target', 'translation_success']);
        });
    }
}