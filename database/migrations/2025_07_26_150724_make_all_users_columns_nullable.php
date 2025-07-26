<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeAllUsersColumnsNullable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom')->nullable()->change();
            $table->string('prenoms')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('pseudo')->nullable()->change();
            $table->string('departement')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nom')->nullable(false)->change();
            $table->string('prenoms')->nullable(false)->change();
            $table->integer('age')->nullable(false)->change();
            $table->string('pseudo')->nullable(false)->change();
            $table->string('departement')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
        });
    }
}

