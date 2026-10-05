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
        Schema::create('course_exams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title', 100);
            $table->text('description');
            $table->boolean('is_flag_questions')->default(false);
            $table->integer('sections')->default(3);
            $table->text('section_1');
            $table->text('section_2')->nullable();
            $table->text('section_3')->nullable();
            $table->integer('marks')->default(45);
            $table->integer('attempts')->default(0);
            $table->integer('min_completion_time')->default(1);
            $table->foreignUuid('course_id')
            ->references('id')
            ->on('courses')->nullOnDelete();
            $table->string('remarks', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_exams');
    }
};
