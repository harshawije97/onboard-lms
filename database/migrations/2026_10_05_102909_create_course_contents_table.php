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
        Schema::create('course_contents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('content_info', 255);
            $table->integer('total_hours');
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
        Schema::dropIfExists('course_contents');
    }
};
