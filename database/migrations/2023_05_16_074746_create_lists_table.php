<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('content', 255);
            $table->string('icon', 255)->default('1.svg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
