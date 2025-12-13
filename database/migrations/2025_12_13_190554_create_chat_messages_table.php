<?php
// database/migrations/xxxx_create_chat_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('pseudo');
            $table->text('message');
            $table->enum('sender', ['client', 'admin'])->default('client');
            $table->boolean('read')->default(false);
            $table->boolean('replied')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            
            $table->index(['user_id', 'created_at']);
            $table->index(['read', 'replied']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
};