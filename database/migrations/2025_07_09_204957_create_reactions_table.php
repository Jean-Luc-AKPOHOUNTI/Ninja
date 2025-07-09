<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('ninja_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['like', 'love', 'wow', 'angry', 'laugh', 'sad']);
            $table->timestamps();
            
            $table->unique(['user_id', 'ninja_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};