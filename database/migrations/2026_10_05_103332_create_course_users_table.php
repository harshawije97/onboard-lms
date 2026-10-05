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
        Schema::create('course_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('user_name', 100);
            $table->text('foot_note')->nullable();
            $table->text('status');
            $table->foreignUuid('course_id')->references('id')
                ->on('courses')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            ;
            $table->foreignUuid('org_id')->references('id')
                ->on('organizations')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_users');
    }
};
