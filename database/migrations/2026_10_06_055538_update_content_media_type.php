<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('content_media', function (Blueprint $table) {
            $table->renameColumn('user_level', 'media_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('content_media', function (Blueprint $table) {
            $table->renameColumn('media_type', 'user_level');
        });
    }
};
