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
        Schema::table('ninjas', function (Blueprint $table) {
            $table->string('image')->nullable()->after('bio');
            $table->text('story')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ninjas', function (Blueprint $table) {
            $table->dropColumn(['image', 'story']);
        });
    }
};
