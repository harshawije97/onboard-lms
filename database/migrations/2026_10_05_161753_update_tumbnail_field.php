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
        Schema::table('courses', function (Blueprint $table) {
            $table->renameColumn('thumbnail', 'thumbnail_url');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->text('thumbnail_url')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->string('thumbnail_url')->change();
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->renameColumn('thumbnail_url', 'thumbnail');
        });
    }
};
