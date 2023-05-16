<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Создание таблицы страниц
     */
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->string('url', 255)->unique();
            $table->text('content')->unique();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Удаление таблицы страниц
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
