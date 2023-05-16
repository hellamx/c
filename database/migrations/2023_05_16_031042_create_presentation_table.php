<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('presentation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content', 255);
            $table->string('icon', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presentation');
    }
};
