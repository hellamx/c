<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы пользователей
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('login', 64)->unique();
            $table->string('username', 64);
            $table->string('password', 255);
            $table->string('phone', 25)->nullable();
            $table->string('position', 255)->default('Менеджер');
            $table->string('email', 255)->nullable();
            $table->integer('role')->default(0);
            $table->string('image', 255)->nullable();
            $table->string('image_full', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы пользователей
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
