<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->default('user');
            $table->boolean('status')->default('1');
            $table->string('name');
            $table->string('lastname');
            $table->string('mobile', 14)->nullable();
            $table->string('email')->unique();
            $table->string('username', 50)->nullable();
            $table->string('credit')->default(100000);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
