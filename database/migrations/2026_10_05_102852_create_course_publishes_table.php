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
        Schema::create('course_publishes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('short_name', 100)->nullable();
            $table->string('category', 50)->nullable();
            $table->string('visibility', 50)->default('public');
            $table->boolean('is_course_timeline_enabled')->default(false);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->text('announcements')->nullable();
            $table->decimal('course_progress', 5, 2)->nullable();
            $table->foreignUuid('course_id')->references('id')
            ->on('courses')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_publishes');
    }
};
